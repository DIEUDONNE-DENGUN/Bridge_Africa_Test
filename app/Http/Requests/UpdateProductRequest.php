<?php

namespace App\Http\Requests;

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
}
