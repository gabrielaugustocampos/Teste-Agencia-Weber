<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
             'descricao' => 'max:255',
             'url' => 'required|max:255|string',
         ];
     }

     public function messages()
     {
         return [
             'titulo.required' => 'Digite o titulo do seu video',
             'titulo.string' => 'Caracteres inválidos no campo titulo',
             'titulo.max' => 'O campo titulo pode conter no máximo 255 caracteres',
             'descricao.max' => 'O campo descrição pode conter no máximo 255 caracteres',
             'url.required' => 'Digite a url do seu video',
             'url.max' => 'O campo url pode conter no máximo 255 caracteres',
             'url.string' => 'Caracteres inválidos no campo url',
         ];
     }
}
