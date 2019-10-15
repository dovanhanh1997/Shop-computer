<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestForm extends FormRequest
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
        if (request()->has('image')) {
            return [
                'productName' => 'required',
                'productPrice' => 'required',
                'image' => 'image',
            ];
        }
        return [
            'productName' => 'required',
            'productPrice' => 'required',
        ];
    }
}
