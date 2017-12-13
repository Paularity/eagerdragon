<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateChargebackRequest extends FormRequest
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
            'merchant_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'status' => 'required',
            'dispute_result' => 'required',
        ];
    }
}
