<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLogoRequest extends FormRequest
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
            'company_logo' => 'required|mimes:jpg,jpeg,png,
                    PNG,JPEG,JPG|max:2048',
        ];
    }

    public function messages(  )
    {
        return [
            'company_logo.size' => 'The company logo must be less than or equal to 2MB.'
        ];
    }
}
