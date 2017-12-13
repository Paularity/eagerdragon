<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVirtualTerminalRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'billing_firstname' => 'required|alpha',
            'billing_lastname' => 'required|alpha',
            'billing_address' => 'required',
            'billing_mobile' => 'required|numeric',
            'billing_email' => 'required|email',
            'shipping_firstname' => 'required|alpha',
            'shipping_lastname' => 'required|alpha',
            'shipping_address' => 'required',
            'shipping_mobile' => 'required|numeric',
            'shipping_email' => 'required|email',
        ];
    }
}
