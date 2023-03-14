<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProdutoValidator extends FormRequest
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
        $rules['MATERIAIS'] = 'sometimes|min:1';
        $rules['quantidade_inicial'] = 'sometimes|nullable|min:1';
        $rules['NOME'] = 'required|max:60|min:2';
        $rules['DESC'] =  'required|max:300|min:4';
        $rules['VALOR'] = 'required|min:0';
        $rules['ID_CATEGORIA'] = 'required';
        $rules['ID_MEDIDA'] = 'required';
        return $rules;
    }
    public function messages()
    {
        return [
            'NOME.required' => ' O nome não foi inserido',
            'DESC.required' => ' A descrição não foi inserida',
            'VALOR.required' => ' O valor do produto não foi inserido',
            'MATERIAIS.min' => ' Deve se ter ao minimo uma materia prima no produto',
            'NOME.min' => ' O nome deve ter ao menos 2 caracteres',
            'DESC.min' => ' A descrição deve ter ao menos 4 caracteres',
            'ID_CATEGORIA.required' => ' Deve se ter uma categoria no produto',
            'ID_MEDIDA.required' => 'Deve se ter uma medida no produto',
            'quantidade_inicial.min' => 'A quantidade deve ser no minimo : 1',
            'NOME.max' => 'O nome deve ter no máximo 60 caracteres',
            'DESC.max' => 'A descrição deve ter no maximo 300 caracteres',
        ];
    }
}
