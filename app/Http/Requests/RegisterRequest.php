<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:email, user',
            'password' => 'required'
        ];
    }

    public function message () {
        return [
            'email.required' => 'Vui long nhap email',
            'email.unique' => 'email nay da ton tai', 
            'password.required' => 'Vui long nhap password'
        ];
    }
}
