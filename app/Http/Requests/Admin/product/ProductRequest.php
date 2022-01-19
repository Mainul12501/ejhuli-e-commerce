<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules()
    {
        $productCheckArray =  [
            'productSku' => "required|alpha_num|min:2|max:100|unique:products,sku,{$this->editId},id",
            'productName' => 'required|string|min:2|max:150',
            'regularPrice' => 'required|numeric|min:1',
            'productSlug' => "required|min:2|max:200|unique:products,product_slug,{$this->editId},id",
            'productStock' => 'required|numeric|min:1',
            'productUnit' => 'required|string|min:1',
            'productCategory.*' => 'required',
            'productSubCategory.*' => 'required',
//            'productBrands.*' => 'required',
            'product_tags.*' => 'required',
            'productDisplay.*' => 'required',
            'productDescription' => 'required|string|min:5',
            'additionalInfo' => 'nullable|string|min:5',
        ];
        if ($this->productImage){
            $productCheckArray['productImage'] = 'required|image|mimes:png,jpg,jpeg,PNG,JPG,JPEG';
        }
        if ($this->otherImage1){
            $productCheckArray['otherImage1'] = 'required|image|mimes:png,jpg,jpeg,PNG,JPG,JPEG';
        }
        if ($this->otherImage2){
            $productCheckArray['otherImage2'] = 'required|image|mimes:png,jpg,jpeg,PNG,JPG,JPEG';
        }
        if ($this->salePrice){
            $productCheckArray['salePrice'] = 'required|numeric|min:1';
        }
        if ($this->method() == 'PATCH'){
            $productCheckArray['editId'] = 'required|integer|min:1|exists:products,id';
        }
        return $productCheckArray;
    }
}
