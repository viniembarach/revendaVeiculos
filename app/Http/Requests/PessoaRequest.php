<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
            'cpf'      => 'required|min:11|max:11',
            'nome'     => 'required|min:5',
            'telefone' => 'required|min:10|max:11',
            'endereco' => 'required|min:10|max:500',
            'tipo'     => 'required',
        ];
    }
}
