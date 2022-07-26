<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'email' => 'required|email|max:50',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'Por favor, Digite um e-mail válido!',
            'email.max' => 'O campo e-mail deve conter no máximo 50 caracteres!',
        ];
    }
}
