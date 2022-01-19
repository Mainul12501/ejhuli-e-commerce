<?php

namespace App\Http\Requests\User\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        $addressCheckArray = [
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email_address' => 'required|email|min:3|max:50',
            'address_contact' => 'required|numeric|digits:11',
//            'country' => 'required',
            'street_address' => 'string|min:10|max:100',
            'state' => 'required',
            'city_town' => 'required|string|min:2|max:50',
            'postal_zip_code' => 'required|numeric|digits_between:4,6',
            'address_type' => 'required',
        ];
        if ($this->method() == 'PATCH') {
            $addressCheckArray['edit_id'] = 'required|integer|min:1|exists:customer_addresses,id';
        }

        return $addressCheckArray;
    }
}
