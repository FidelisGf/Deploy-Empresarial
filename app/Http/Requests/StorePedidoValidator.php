<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoValidator extends FormRequest
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
            'METODO_PAGAMENTO' => 'required',
            'produtos' => 'required',
            'aprovado' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'METODO_PAGAMENTO.required' => ' O metodo de pagamento é obrigatorio',
            'produtos.required' => ' Os produtos no pedido são obrigatorios',
            'aprovado.required' => ' A situação do pedido é obrigatoria',


        ];
    }
}
