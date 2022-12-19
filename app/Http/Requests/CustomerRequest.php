<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            "contact" => ['required', 'string', 'unique:customers,contact', 'max:255'],
            "email",
            "code_country",
            "phone_number",
            "phone_number_secondary",
            "active",

            "address",
            "number",
            "colony",
            "city",
            "state",
            "zip",
            "geoCoord",

            "type",
            "credit_limit"
        ];
    }
}
