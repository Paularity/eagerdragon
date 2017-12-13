<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateAgentRequest extends FormRequest
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
        return [
            // 'role' => 'required|exists:roles,name',
            'username' => 'required|alpha_dash|max:24|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required|unique:users,mobile_number',
            'address1' => 'required',
            'zippostal_code' => 'required|numeric',
            'account_number' => 'required',
            'legal_name' => 'required',
            'tax_id' => 'required',
            'business_type' => 'required',
            'swift_routing_number' => 'required',
        ];
    }
}
