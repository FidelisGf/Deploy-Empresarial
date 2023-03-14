<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryValidator extends FormRequest
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
            'NOME_C' => 'required|max:50|min:4',
        ];
    }
    public function messages()
    {
        return [
            'NOME_C.required' => ' O nome é obrigatorio',
            'NOME_C.min' => ' O nome deve ter no mínimo 4 caracteres',
            'NOME_C.max' => ' O nome deve ter no máximo 50 caracteres',
        ];
    }
}
