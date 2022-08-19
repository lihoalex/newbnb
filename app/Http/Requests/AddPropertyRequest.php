<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPropertyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'zipcode' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'apartment' => 'required|string',
            'bathrooms' => 'required|digits_between:0,10',
            'bedrooms' => 'required|digits_between:0,20',
            'sqft' => 'required|digits_between:0,100000',
            'house_type' => 'required|exists:house_types,id',
            'auto_calculate' => 'required_without:price|boolean',
            'price' => 'required_without:auto_calculate|digits_between:0,100000'
        ];
    }
}
