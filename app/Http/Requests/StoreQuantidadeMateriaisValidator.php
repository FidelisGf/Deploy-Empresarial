<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuantidadeMateriaisValidator extends FormRequest
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
            'QUANTIDADE' => 'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'QUANTIDADE.required' => ' A quantidade não foi inserida',
            'QUANTIDADE.min' => 'A quantidade minima necessária é : 1'
        ];
    }
}
