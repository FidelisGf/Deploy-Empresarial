<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenalidadeValidator extends FormRequest
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
            'TIPO' => 'required|max:20|min:5',
            'DESC' => 'required|max:120|min:4',
            'DATA'=> 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'TIPO.required' => ' O tipo da penalidade é obrigatorio',
            'TIPO.min' => ' O tipo deve ter no minimo 5 caracteres',
            'DESC.min' => ' A descrição minima deve ter 4 caracteres',
            'DESC.max' => ' A descrição máxima deve ser de 120 caracteres',
            'DATA.date' => ' Não é uma data válida',
            'DATA.required' => ' É necessário informar a data',
        ];
    }
}
