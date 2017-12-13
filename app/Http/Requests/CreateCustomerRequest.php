<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'merchant_id' => 'required|exists:users,id',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'country' => 'required',
            'address1' => 'required',
            'us_state' => 'required',
            'city' => 'required',
            'zippostal_code' => 'required',
            'timezone' => 'required',
        ];

        return $rules;
    }
}
