<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:250',
            'description' => 'max:3000',
            'price' => 'required|numeric|between:0.00,99.99',
            'stock_count' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name',
            'price.required' => 'Please enter the product price',
            'stock_count.required' => 'Please enter the qunatity'
        ];
    }
}