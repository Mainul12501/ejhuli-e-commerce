<?php

namespace App\Http\Requests\Admin\Media\Other;

use Illuminate\Foundation\Http\FormRequest;

class OtherImageRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        ];
    }
}
