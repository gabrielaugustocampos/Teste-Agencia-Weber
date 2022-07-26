<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegmentosRequest extends FormRequest
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
             'titulo' => 'required|string|max:255',
             'descricao' => 'required|string|max:255',
             'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
         ];
     }

     public function messages()
     {
         return [
             'titulo.required' => 'Digite o titulo do seu segmento',
             'titulo.string' => 'Caracteres inválidos no campo titulo',
             'titulo.max' => 'O campo titulo pode conter no máximo 255 caracteres',
             'descricao.required' => 'Digite a descrição do seu segmento',
             'descricao.string' => 'O campo descrição deve um texto',
             'descricao.max' => 'O campo descrição pode conter no máximo 255 caracteres',
             'imagem.image' => 'Este arquivo não é uma imagem',
             'imagem.mimes' => 'Subir imagens nesses formatos apenas jpeg,png,jpg,gif,svg',
             'imagem.max' => 'Arquivo deve conter no máximo 3MB',
         ];
     }
}
