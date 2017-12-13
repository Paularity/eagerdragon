<?php
    
namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
        $rules = [     
            'firstname' => 'required',  
            'lastname' => 'required',        
            'username' => 'required|alpha_dash|max:24|unique:users,username',
            'mobile_number' => 'required|unique:users,mobile_number',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|exists:roles,name',
            'abilities' => 'required',
            'status' => [
                'sometimes',
                Rule::in(['pending']),
            ],
        ];

        if ($this->get('abilities')) {
            foreach($this->get('abilities') as $key => $val) {
                $rules['abilities.'.$key] =  Rule::in(
                    (new User())->getPresetAbilities()
                );
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'abilities.required' => 'Please add user abilities.',
        ];
    }
}
