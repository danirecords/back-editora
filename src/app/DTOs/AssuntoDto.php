<?php

namespace App\DTOs;

/**
 * Class AssuntoDto
 *
 * Data Transfer Object (DTO) responsável por transportar os dados de asunto
 * entre as camadas da aplicação (Controller → Service → Model) de forma estruturada.
 *
 * @package App\DTOs
 */
class AssuntoDto
{
    /**
     * Cria uma nova instância de AssuntoDto.
     *
     * @param int|null $codAs Código identificador do assunto (pode ser nulo em novos registros).
     * @param string $Descricao Título do assunto.
     */
    public function __construct(
        public ?int $codAs,
        public string $Descricao,
    ) {}

    /**
     * Cria um DTO a partir de um array de dados.
     *
     * @param array $assunto Array associativo contendo os dados do assunto.
     * @return self Instância de AssuntoDto criada com base nos dados fornecidos.
     */
    public static function fromArray(array $assunto): self
    {
        return new self(
            $assunto['codAs'] ?? null,
            $assunto['Descricao']
        );
    }

    /**
     * Converte o DTO em um array associativo.
     *
     * @return array Dados do assunto em formato de array.
     */
    public function toArray(): array
    {
        return [
            'codAs' => $this->codAs,
            'Descricao' => $this->Descricao,
        ];
    }
}
