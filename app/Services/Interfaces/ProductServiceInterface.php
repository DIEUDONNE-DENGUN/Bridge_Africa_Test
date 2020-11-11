<?php
/**
 * Author: Dieudonne Takougang
 * Date: 11/10/2020
 * Description: handle all business logic related to user products
 */

namespace App\Services\Interfaces;


interface ProductServiceInterface
{
    public function saveProduct(array $product);

    public function findProductById($product);

    public function updateProduct(array $product, $product_id);

    public function deleteProduct($product_id);

}