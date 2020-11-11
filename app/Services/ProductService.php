<?php
/**
 * Author: Dieudonne Takougang
 * Date: 11/10/2020
 * @Description:
 */

namespace App\Services;


use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function saveProduct(array $product)
    {
        //upload and save product image
        $product["image_path"] = $this->uploadProductImage($product);
        return $this->productRepository->create($product);
    }

    public function findProductById($product)
    {
        return $this->productRepository->findById($product);
    }

    public function updateProduct(array $product, $product_id)
    {
        $product_image = $product['image_path'] === "" ? "" : $this->uploadProductImage($product);
        if ($product_image === "") {
            //unset the image path
            unset($product['image_path']);
        } else {
            $product["image_path"] = $product_image;
        }
        return $this->productRepository->update($product, $product_id);
    }

    public function deleteProduct($product_id)
    {
        return $this->productRepository->delete($product_id);
    }

    private function uploadProductImage($image)
    {
        $destination = "products";
        $extension = $image["image_path"]->getClientOriginalExtension();
        $file_name = time() . "_." . $extension;
        //store file in public dir
        $image["image_path"]->move($destination, $file_name);
        return $destination . "/" . $file_name;
    }
}