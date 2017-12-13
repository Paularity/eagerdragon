<?php
    
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRoleRequest extends FormRequest
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
            'name' => 'required|unique:roles,name,'.$this->get('role_id'),
            'title' => 'required|unique:roles,title,'.$this->get('title'),
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'This role already exists.',
        ];
    }
}
