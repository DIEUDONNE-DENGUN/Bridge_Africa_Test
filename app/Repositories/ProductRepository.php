<?php
/**
 * User: Dieudonne Takougang
 * Date: 11/10/2020
 * Description: An implementation for the Product Repository interface
 */

namespace App\Repositories;


use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $productModel;

    public function __construct(Product $model)
    {
        $this->productModel = $model;
    }

    public function create(array $product)
    {
        return $this->productModel->create($product);
    }

    public function findById($product_id)
    {
        return $this->productModel->find($product_id);
    }

    public function update(array $product, $product_id)
    {
        return $this->productModel->find($product_id)->update($product);
    }

    public function delete($product_id)
    {
        return $this->productModel->find($product_id)->delete();
    }

}