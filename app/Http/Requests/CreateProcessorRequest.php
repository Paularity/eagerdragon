<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateProcessorRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'short_name' => 'required',
            'wire_fee' =>
                'required|regex:/^[0-9]{1,10}(,[0-9]{3})*(\.[0-9]+)*$/',
            'timezone' => 'required',
            'type' => 'required',
        ];
    }
}
