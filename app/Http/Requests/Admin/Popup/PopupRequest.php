<?php

namespace App\Http\Requests\Admin\Popup;

use Illuminate\Foundation\Http\FormRequest;

class PopupRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            'link' => 'required|url|min:5|max:255',
            'popup_image' => 'nullable|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'description' => 'required|string|min:10|max:255'
        ];
    }
}
