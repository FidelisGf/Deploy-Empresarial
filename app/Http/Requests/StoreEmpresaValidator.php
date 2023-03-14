<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaValidator extends FormRequest
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
            'NOME' => 'required|unique:EMPRESAS|max:50|min:2',
            'CNPJ' => 'required|unique:EMPRESAS|min:18|max:18',
            'EMAIL'=> 'required|unique:EMPRESAS|email|max:120|min:5',
            'NOME_FANTASIA' => 'required|max:60|min:2',
            'ENDERECO' => 'required|max:255|min:2',
            'INC_ESTADUAL' => 'required|unique:EMPRESAS|max:12|min:9',
        ];
    }
    public function messages()
    {
        return [
            'NOME.required' => ' O nome é obrigatorio',
            'NOME.min' => ' Insira no minimo 2 caracteres para o nome',
            'NOME.max' => ' O nome não pode ter mais de 50 caracteres',
            'NOME.unique' => 'O nome já existe',
            'CNPJ.required' => ' O cnpj da empresa é obrigatorio',
            'CNPJ.unique' => ' O cnpj já está sendo utilizado',
            'CNPJ.min' => ' O cnpj deve conter exatamente 14 caracteres',
            'CNPJ.max' => ' O cnpj deve conter exatamente 14 caracteres',
            'EMAIL.required' => ' O email é obrigatorio ',
            'EMAIL.unique' => ' O email já está sendo utilizado',
            'EMAIL.email' => ' O email não é um e-mail valido',
            'EMAIL.max' => ' O email deve ter no máximo 120 caracteres',
            'EMAIL.min' =>  ' O email deve ter no minimo 5 caracteres',
            'NOME_FANTASIA.required' => ' O nome fantasia é obrigatorio',
            'NOME_FANTASIA.max' => ' O nome fantasia deve no maximo 60 caracteres',
            'NOME_FANTASIA.min' => ' O nome fantasia deve ter no mínimo 2 caracteres',
            'ENDERECO.required' => ' O endereço da empresa é obrigatorio',
            'ENDERECO.min' => ' O endereço deve ter no minimo 2 caracteres',
            'ENDERECO.max' => ' O endereco deve ter no maximo 255 caracteres',
            'INC_ESTADUAL.required' => ' A inscrição estadual é obrigatoria',
            'INC_ESTADUAL.unique' => ' ',
            'INC_ESTADUAL.min' => 'A inscrição estadual deve ter minímo 9 caracteres',
            'INC_ESTADUAL.max' => 'A inscrição estadual deve ter no máximo 12 caracteres'
        ];
    }
}
