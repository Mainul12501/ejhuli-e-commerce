<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUploadRequest extends FormRequest
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
        return [
            'product_file' => 'required|mimes:csv,txt',
            'product_images.*' =>'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG'
        ];
    }
}
