<?php

namespace App\Http\Controllers;

/*
 * @Author:Dieudonne Dengun
 * @Date: 10/11/2020
 */

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\Interfaces\UtilityServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserServiceInterface;

class ProductController extends Controller
{
    private $productService;
    private $utilityService;

    public function __construct(ProductServiceInterface $productService, UtilityServiceInterface $utilityService)
    {
        $this->productService = $productService;
        $this->utilityService = $utilityService;
    }

    public function showAddProductPage()
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $data['user'] = $this->utilityService->getCurrentLoggedUser();
        return view('add_product_form')->with($data);
    }

    public function addProduct(AddProductRequest $request)
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $product_name = $request->get('product_name');
        $product_description = $request->get('product_description');
        $quantity = $request->get('product_quantity');
        $price = $request->get('product_price');
        $product_image = $request->file('product_image');
        $add_product_dto = ["name" => $product_name, "description" => $product_description,
            "quantity" => $quantity, "price" => $price, "image_path" => $product_image, "user_id" => $this->utilityService->getCurrentLoggedUser()->id];
        //save product
        $product = $this->productService->saveProduct($add_product_dto);
        if ($product) {
            $request->session()->flash('message', 'product added successfully!');
            return redirect()->route('products');;
        } else {
            return redirect()->back()->withErrors(['Unable to save product details.']);
        }
    }

    public function showEditProductPage($product_id)
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $product = $this->productService->findProductById($product_id);
        if (!$product) {
            return redirect()->back()->withErrors(['Whoops!, product with this id does not exist']);
        }
        $data['product'] = $product;
        $data['user'] = $this->utilityService->getCurrentLoggedUser();
        return view('edit_product_form')->with($data);
    }

    public function updateProduct(UpdateProductRequest $request, $product_id)
    {
        $product_name = $request->get('product_name');
        $product_description = $request->get('product_description');
        $quantity = $request->get('product_quantity');
        $price = $request->get('product_price');
        $product_image = $request->hasFile("product_image") ? $request->file('product_image') : "";

        $update_product_dto = ["name" => $product_name, "description" => $product_description,
            "quantity" => $quantity, "price" => $price, "image_path" => $product_image];
        //update product
        $product = $this->productService->updateProduct($update_product_dto, $product_id);
        if ($product) {
            $request->session()->flash('message', 'product updated successfully!');
            return redirect()->route('products');
        }
    }

    public function showUserProducts(UserServiceInterface $userService)
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $products = $userService->getUserProducts($this->utilityService->getCurrentLoggedUser()->id);
        $data['products'] = $products;
        $data['user'] = $this->utilityService->getCurrentLoggedUser();
        return view("products")->with($data);
    }

    public function deleteProduct($product_id)
    {
        if (!$this->utilityService->hasSessionValue('isLoggedIn')) {
            return redirect('login');
        }
        $product = $this->productService->findProductById($product_id);
        if (!$product) {
            return redirect()->back()->withErrors(['Whoops!, product with this id does not exist']);
        }
        //delete product
        $this->productService->deleteProduct($product_id);
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('products');;
    }
}
