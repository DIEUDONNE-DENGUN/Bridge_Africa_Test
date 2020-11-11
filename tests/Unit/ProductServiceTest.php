<?php

namespace Tests\Unit;

use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
//test of  add product
    public function testAddProduct()
    {
        $productRepository = new ProductRepository(new Product());
        $productService = new ProductService($productRepository);

        Storage::fake('product_image');
        $file = UploadedFile::fake()->image('product_image.jpg');
        $product_image = $file;

        $product_dto = ["name" => "Test Product Namw", "description" => "Test product description",
            "quantity" => 10, "price" => 1000, "image_path" => $product_image,
            "user_id" => 1];
        $addProduct = $productService->saveProduct($product_dto);

        $this->assertInstanceOf(Product::class, $addProduct);
        $this->assertEquals($product_dto['name'], $addProduct->name);
        $this->assertEquals($product_dto['price'], $addProduct->price);
    }

// test for update product service
    public function testUpdateproduct()
    {

        $productRepository = new ProductRepository(new Product());
        $productService = new ProductService($productRepository);

        Storage::fake('product_image');
        $file = UploadedFile::fake()->image('product_image.jpg');
        $product_image = $file;

        $product_dto = ["name" => "Update Product 6", "description" => "Test product description update 6",
            "quantity" => 10, "price" => 1001, "image_path" => $product_image];
        $updateProduct = $productService->updateProduct($product_dto, 6);
        //update count = 1 for one updated product
        $this->assertEquals(1, $updateProduct); //indicate a product was updated successfully
    }
}
