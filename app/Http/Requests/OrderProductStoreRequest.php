<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            //'order_id' => ['required'],
            'product_id' => ['required'],
            'order_quantity' => ['required', 'integer', 'max:1000000'],
            'order_amount' => ['required', 'integer', 'max:1000000'],
        ];
    }
}
