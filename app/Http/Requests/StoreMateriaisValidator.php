<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMateriaisValidator extends FormRequest
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
            'NOME' => 'required|min:3|max:60',
            'CUSTO' => 'required|',
            'QUANTIDADE' => 'required|min:1'
        ];
    }
    public function messages()
    {
        return [
            'NOME.required' => ' O nome é obrigatorio',
            'NOME.min' => ' Insira no minimo 3 caracteres para o nome',
            'NOME.max' => ' O nome não pode ter mais de 60 caracteres',
            'CUSTO.required' => ' O custo é obrigatorio',
            'QUANTIDADE.required' => ' A quantidade é obrigatoria',
            'QUANTIDADE.min' => ' A quantidade minima é : 1'
        ];
    }
}
