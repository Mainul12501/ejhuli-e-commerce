<?php

namespace App\Http\Requests\Admin\offers;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
        $discountCheckArray =  [
            'couponName' => 'required|string|min:3|max:255',
            'discount' => 'required|numeric|min:1|max:99',
            'categories.*' => 'sometimes',
            'description' => 'required|string|min:3|max:255',
           /* 'startDate' => 'required|date_format:d-m-Y',
            'validityDate' => 'required|date_format:d-m-Y|after:startDate',*/
        ];
        return $discountCheckArray;
    }
}
