<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateCustomer extends FormRequest
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
            'customer_name' => 'required|min:4|max:20',
            'customer_age' => 'required',
            'customer_email' => 'required|unique:customers',
            'customer_address' => 'required|min:8|max:80',
            'customer_city' => 'required|min:4|max:20',
            'customer_postal_code' => 'required|min:4|max:10',
            'customer_phone' => 'required|min:10|max:18',
            'customer_identity_no' => 'required|min:10|max:20',
        ];
    }
}
