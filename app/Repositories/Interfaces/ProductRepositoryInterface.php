<?php
/**
 * User: Dieudonne Takougang
 * Date: 11/10/2020
 * @Description: handle all user products related database operations
 */

namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    public function create(array $product);

    public function findById($product_id);

    public function update(array $product, $product_id);

    public function delete($product_id);
}