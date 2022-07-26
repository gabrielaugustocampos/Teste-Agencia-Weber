<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'nome' => 'required|max:50',
            'email' => 'required|email|max:50',
            'telefone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.max' => 'O campo nome pode conter no máximo 50 caracteres!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'Por favor, Digite um e-mail válido!',
            'email.max' => 'O campo e-mail deve conter no máximo 50 caracteres!',
            'telefone.required' => 'O campo telefone é obrigatório'
        ];
    }
}
