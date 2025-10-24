<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoRequest extends FormRequest
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
            'Descricao' => 'required|string|max:255',
        ];
    }

    /**
     * Mensagens personalizadas (opcional)
     */
    public function messages(): array
    {
        return [
            'Descricao.required' => 'O campo descrição é obrigatório.',
        ];
    }
}
