<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required|max:10|min:3',
            // 'username' => ['required','max:10','min:3']
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|integer',
            'phone' => 'required|string',
            'password' => 'required|numeric|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => \trans('message.create_user.fail',[], 'vi'),
            'username.max' => 'nhap toi da 10 ki tu',
            'email.required' => 'bat buoc nhap email',
        ];
    }
}
