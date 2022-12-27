<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstoqueValidator extends FormRequest
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
            'product_id' => 'required|min:1',
            'quantidade' => 'required|min:1',

        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => ' O id do produto é obrigatorio',
            'quantidade.required' => ' A quantidade a ser adicionada é obrigatoria',
            'product_id.min' => ' O id minimo é 1',
            'quantidade.min' => ' A quantidade minima é : 1'

        ];
    }
}
