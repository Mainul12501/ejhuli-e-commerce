<?php

namespace App\Http\Requests\User\Query;

use Illuminate\Foundation\Http\FormRequest;

class QueryRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|email|min:5|max:100',
            'subject' => 'required|string|min:5|max:100',
            'message' => 'required|string|min:5|max:255',
        ];
    }
}
