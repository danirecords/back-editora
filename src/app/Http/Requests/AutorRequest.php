<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
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
            'Nome' => 'required|string|max:255',
        ];
    }

    /**
     * Mensagens personalizadas (opcional)
     */
    public function messages(): array
    {
        return [
            'Nome.required' => 'O campo nome é obrigatório.',
        ];
    }
}
