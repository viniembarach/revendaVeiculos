<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
            'nome' => 'required|min:2',
            'ano_fabri' => 'required|min:4|max:4',
            'modelo' => 'required|min:1|max:50',
            'preco' => 'required',
            'fabricante_id' => 'required',
            'tipo_veiculo_id' => 'required',
        ];
    }
}
