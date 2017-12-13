<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateMerchantAccountRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|alpha_dash|max:24|unique:users,username',
            'mobile_number' => 'required|unique:users,mobile_number',
            'email' => 'required|email|unique:users,email',
            'business_name' => 'required',
            'business_type' => 'required',
            'description' => 'required|max:199',
            'start_date' => 'required|date|before:tomorrow',
            'estimated_monthly_sales' =>
                'required|regex:/^[0-9]{1,10}(,[0-9]{3})*(\.[0-9]+)*$/',
            'industry' => 'required',
            'business_legal_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required|numeric',
            'country' => 'required',
            'business_country' => 'required',
            'business_address' => 'required',
            'business_city' => 'required',
            'business_state' => 'required',
            'business_zip' => 'required|numeric',
            'account_number' => 'required',
            'routing_number' => 'required',
            'tax_id' => 'required',
        ];
    }
}
