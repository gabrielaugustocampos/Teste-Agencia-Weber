<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagContatoRequest extends FormRequest
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
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'texto' => 'required|string'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'email.email' => 'Digite um email válido',
            'email.required' => 'O campo email é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'texto.required' => 'O campo mensagem é obrigatório'
        ];
    }
}
