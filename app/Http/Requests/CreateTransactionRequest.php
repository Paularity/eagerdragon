<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
            'processor_id' => 'required|exists:processors,id',
            'customer_id' => 'required|exists:customers,id',
            'credit_card_number' => 'required',
            'credit_card_cvv' => 'required|numeric',
            'amount' => 'required|numeric',
        ];
    }
}
