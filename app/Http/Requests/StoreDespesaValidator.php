<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDespesaValidator extends FormRequest
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
            'DESC' => 'required|max:300|min:3',
            'CUSTO' => 'required|min:0',
            'ID_TAG'=> 'required|min:1',
            'DATA' => 'required|date'
        ];

    }
    public function messages()
    {
        return [
            'DESC.required' => ' A descrição é obrigatoria',
            'DESC.min' => ' A descrição deve ter no mínimo 3 caracteres',
            'DESC.max' => ' A descrição deve ter no máximo 300 caracteres',
            'CUSTO.required' => ' O custo é obrigatorio',
            'ID_TAG.required' => ' O tipo de despesa é obrigatorio',
            'DATA.required' => ' A data é obrigatoria',
            'DATA.date' => ' A data está em um formato incorreto !'
        ];
    }
}
