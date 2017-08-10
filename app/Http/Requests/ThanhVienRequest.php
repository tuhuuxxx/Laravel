<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhVienRequest extends FormRequest
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
            'user' => 'required',
            'pass' => 'required'
        ];
    }

    public function message ()
    {
        return [
            'user.required' => 'Vui long nhap username',
            'pass.required' => 'Vui long nhap password'
        ];
    }
}
