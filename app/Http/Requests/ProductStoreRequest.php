<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'max:1000000'],
            'purchase_price' => ['required', 'integer', 'max:1000000'],
            'selling_price' => ['required', 'integer', 'max:1000000'],
        ];
    }
}
