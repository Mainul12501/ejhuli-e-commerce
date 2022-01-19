<?php

namespace App\Http\Requests\Admin\brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $brandCheckArray = [
            'brandName' => "required|string|min:2|max:100",
            'brandSlug' => "required|min:2|max:200|unique:brands,slug,{$this->editId},id",
            'description' => "sometimes",
        ];

        if ($this->brandLogo){
            $brandCheckArray['brandLogo'] = 'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG';
        }
        if ($this->method() == 'PATCH') {
            $brandCheckArray['editId'] = 'required|integer|min:1|exists:brands,id';
        }
        return $brandCheckArray;
    }
}
