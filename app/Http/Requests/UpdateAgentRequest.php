<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAgentRequest extends FormRequest
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
            'username' => 'required|alpha_dash|max:24|unique:users,username,'
                . $this->get('user_id'),
            'email' => 'required|email:unique:users,email,'
                . $this->get('user_id'),
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required|unique:users,mobile_number,'
                . $this->get('user_id'),
            'account_number' => 'required',
            'legal_name' => 'required',
            'tax_id' => 'required',
            'business_type' => 'required',
            'swift_routing_number' => 'required',

        ];
    }
}
