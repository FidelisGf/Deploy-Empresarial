<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResetPwValidator extends FormRequest
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
            'EMAIL'=> 'sometimes|min:12|email',
            'PW' => 'sometimes|min:6|max:50',
            'token' => 'sometimes|min:1',
        ];
    }
    public function messages()
    {
        return [
            'EMAIL.email' => ' O email não está em formato válido ',
            'PW.min' => ' A nova senha deve ter no minimo 6 caracteres',
            'token.min' => ' O token deve ter no minimo 1 caracter'
        ];
    }
}
