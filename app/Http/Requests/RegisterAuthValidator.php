<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthValidator extends FormRequest
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
            'NAME' => 'required|max:50|min:4',
            'PASSWORD' => 'required|max:50|min:6|sometimes',
            'EMAIL'=> 'required|max:60|min:8|email',
            'ID_ROLE' => 'sometimes'
        ];
    }
    public function messages()
    {
        return [
            'NAME.required' => ' O nome é obrigatorio',
            'NAME.min' => ' O nome deve ter no mínimo 4 caracteres',
            'NAME.max' => ' O nome deve ter no máximo 50 caracteres',
            'CPF.required' => ' O cpf é obrigatorio',
            'EMAIL.required' => ' O email é obrigatorio',
            'EMAIL.min' => ' O email deve ter no mínimo 8 caracteres',
            'EMAIL.max' => ' O email deve ter no máximo 60 caracteres',
            'EMAIL.email' => ' O email não está em um formato válido',
            'PASSWORD.required' => ' A senha é obrigatoria ',
            'PASSWORD.min' => 'A senha deve conter no mínimo 6 caracteres',
            'PASSWORD.max' => 'A senha deve ter no máximo 50 caracteres'
        ];
    }
}
