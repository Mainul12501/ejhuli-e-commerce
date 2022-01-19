<?php

namespace App\Http\Requests\User\Rating;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
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
        $validationArr =  [
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|min:5|max:200',
            'product_id' => 'required|integer|min:1|exists:products,id',
            'order_id' => 'required|exists:orders,id',
            'product_pictures.*' => 'image|mimes:jpeg,bmp,png|max:2000'
        ];
        return $validationArr;
    }
}
