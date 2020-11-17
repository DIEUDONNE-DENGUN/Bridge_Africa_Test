<?php

namespace App\Http\Requests;

use App\Dtos\ProductDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(\Illuminate\Http\Request $request)
    {
        $rules = ['product_name' => 'required', 'product_description' => 'required',
            'product_quantity' => 'required|numeric', 'product_price' => 'required|numeric'
        ];
        if ($request->hasFile('product_image')) {
            $rules['product_image'] = 'required|max:3000|mimes:jpg,jpeg,png';
        }
        return $rules;
    }

    /*
     * @Author:Dieudonne Dengun
     * @Date: 17/11/2020
     */
    public function getProductDTO()
    {
        $product_image = $this->hasFile("product_image") ? $this->file('product_image') : "";
        return (array)new ProductDTO($this->input('product_name'), $this->input('product_description'),
            $this->input('product_quantity'), $this->input('product_price'), $product_image);
    }
}
