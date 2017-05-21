<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required",
            'email' => "required|email|unique:users,email",
            'password' => 'required|min:6',
            'cfpassword' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'name.required' => "This field is required!",
            'email.unique' => "Email already existed, please enter another email address!",
            'cfpassword.same' => "Confirm password and password must be the same!"
        ];
    }
}
