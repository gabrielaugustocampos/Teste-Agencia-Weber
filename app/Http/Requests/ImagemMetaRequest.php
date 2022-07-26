<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagemMetaRequest extends FormRequest
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
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:190',

        ];
    }

    public function messages()
    {
        return [
            'imagem.required' => 'Escolha uma imagem da sua meta tag',
            'imagem.max' => 'Arquivo deve conter no máximo 190 KB',
            'imagem.image' => 'Este arquivo não é uma imagem!',
            'imagem.mimes' => 'Suba imagens apenas nesses formatos jpeg,png,jpg,gif,svg!'
        ];
    }
}
