<?php
/**
 * Author: Dieudonne Dengun
 * Date: 11/17/2020
 */

namespace App\Dtos;


class ProductDTO
{
    public $name;
    public $description;
    public $quantity;
    public $price;
    public $image_path;

    /**
     * ProductDTO constructor.
     * @param $name
     * @param $description
     * @param $quantity
     * @param $price
     * @param $image_path
     */
    public function __construct($name, $description, $quantity, $price, $image_path)
    {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->image_path = $image_path;
    }

}