<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAgentCSRRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'email' => 'required|unique:agent_csr,email,'
                . $this->get('user_id'),
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'address' => 'required',
            'mobile' => 'required|unique:agent_csr,mobile,'
                . $this->get('user_id')
        ];
    }
}
