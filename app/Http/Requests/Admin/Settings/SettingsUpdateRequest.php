<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
            'delivery_charge' => 'nullable|numeric|min:1|max:1000',
            'offer_text' => 'required|string|min:1|max:100',
            'cash_on_delivery' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ];
    }
}
