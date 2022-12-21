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
            "email" => ['required', 'string', 'unique:customers,email', 'max:255'],
            "code_country" => ['required', 'string', 'max:255'],
            "phone_number" => ['required', 'string', 'unique:customers,phone_number', 'max:255'],
            "phone_number_secondary" => ['nullable', 'string', 'unique:customers,email', 'max:255'],
            "active",

            "address" => ['required', 'string', 'max:255'],
            "number" => ['required', 'string', 'max:255'],
            "colony" => ['required', 'string', 'max:255'],
            "city" => ['required', 'string', 'max:255'],
            "state" => ['required', 'string', 'max:255'],
            "zip" => ['required', 'string', 'max:255'],
            "geoCoord" => ['required', 'string', 'max:255'],
            "complete_address" => ['required', 'string', 'max:255'],

            "type" => ['required', 'string', 'max:255'],
            "credit_limit" => ['required', 'numeric']
        ];
    }
}
