<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientValidator extends FormRequest
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
            'NOME' => 'required|max:60|min:2',
            'CPF' => 'required|min:11|max:11',
            'ENDERECO'=> 'required|min:8',
            'EMAIL'=> 'required|min:8|email',
            'TELEFONE' => 'required|min:11|max:12'
        ];
    }
    public function messages()
    {
        return [
            'NOME.required' => ' O nome é obrigatorio',
            'NOME.min' => ' O nome deve ter no mínimo 2 caracteres',
            'NOME.max' => ' O nome deve ter no máximo 60 caracteres',
            'CPF.required' => ' O cpf é obrigatorio',
            'CPF.min' => ' O cpf deve conter exatos 11 digitos',
            'CPF.max' => ' O cpf deve conter exatos 11 digitos',
            'ENDERECO.required' => ' O endereço é obrigatorio',
            'ENDERECO.min' => ' O endereço deve ter no mínimo 8 caracteres',
            'EMAIL.required' => ' O email é obrigatorio',
            'EMAIL.min' => ' O email deve ter no mínimo 8 caracteres',
            'TELEFONE.required' => ' O telefone é obrigatorio',
            'TELEFONE.min' => ' O telefone deve ter no mínimo 11 caracteres',
            'TELEFONE.max' => ' O telefone deve ter no máximo 12 caracteres'
        ];
    }

}
