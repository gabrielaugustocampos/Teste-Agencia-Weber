<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaRequest extends FormRequest
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
            'tipo_meta' => 'numeric|required|max:9|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tipo_meta.required' => 'Escolha um tipo de meta tag',
            'tipo_meta.max' => 'Este tipo de meta tag selecionado não é válido, Parece que alguém editou os valores do select!',
            'tipo_meta.min' => 'Este tipo de meta tag selecionado não é válido, Parece que alguém editou os valores do select!',
        ];
    }
}
