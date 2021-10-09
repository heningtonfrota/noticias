<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoticiaRequest extends FormRequest
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
            'titulo' => 'required',
            'conteudo' => 'required',
            'status' => [
                'required',
                Rule::in(['A', 'I'])
            ],
            'data_publicacao' => 'date_format:d/m/Y',
            'imagem' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            //'required' => 'O campo :attribute é obrigatório',
            'titulo.required' => 'O campo título é obrigatório',
            'conteudo.required' => 'O campo conteúdo é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'data_publicacao.date_format' => 'O campo data da publicação é obrigatório',
            'imagem.image' => 'O campo imagem deve ser preenchido com uma imagem',
            'status.in' => 'O status só pode ser Ativo ou Inativo'
        ];
    }
}
