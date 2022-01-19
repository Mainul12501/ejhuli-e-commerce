<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:50',
            'contact' => 'required|numeric|digits:10',
            'profile' => 'sometimes|required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'email' => 'required|email|min:3|max:50',
            'password' => 'nullable|required_if:change_password,on|string|min:5|max:30'
        ];
    }
}
