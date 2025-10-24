<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta requisição.
     */
    public function authorize(): bool
    {
        return true; // deixa true se não há regras de autenticação
    }

    /**
     * Regras de validação da requisição.
     */
    public function rules(): array
    {
        return [
            'Titulo' => 'required|string|max:255',
            'Editora' => 'required|string|max:255',
            'Edicao' => 'required|integer',
            'AnoPublicacao' => 'required|integer|min:1000|max:9999',
        ];
    }

    /**
     * Mensagens personalizadas (opcional)
     */
    public function messages(): array
    {
        return [
            'Titulo.required' => 'O campo título é obrigatório.',
            'Editora.required' => 'O campo editora é obrigatório.',
            'Edicao.required' => 'A edição é obrigatória.',
            'AnoPublicacao.required' => 'O ano de publicação é obrigatório.',
        ];
    }
}
