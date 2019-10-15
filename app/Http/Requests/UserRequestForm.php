<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestForm extends FormRequest
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
            'name' => 'required|min:2|max:8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Filed is required',
            'name.min' => 'Name must at least 2 character',
            'name.max' => 'Name can not exceed 8 character',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalidate',
            'email.unique' => 'Email is already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must at least 5 character'
        ];
    }
}
