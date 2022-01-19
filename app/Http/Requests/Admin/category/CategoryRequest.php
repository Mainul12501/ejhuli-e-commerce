<?php

namespace App\Http\Requests\Admin\category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $categoryCheckArray = [
            'category' => "required|string|min:2|max:100",
            'navigation' => "required|integer|min:1",
            'description' => "sometimes",
        ];

       /* if ($this->categoryImage){
            $categoryCheckArray['categoryImage'] = 'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG';
        }*/
        if ($this->method() == 'PATCH') {
            $categoryCheckArray['editId'] = 'required|integer|min:1|exists:categories,id';
        }

        return $categoryCheckArray;
    }
}
