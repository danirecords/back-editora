<?php

namespace App\DTOs;

/**
 * Class AutorDto
 *
 * Data Transfer Object (DTO) responsável por transportar os dados do autor
 * entre as camadas da aplicação (Controller → Service → Model) de forma estruturada.
 *
 * @package App\DTOs
 */
class AutorDto
{
    /**
     * Cria uma nova instância de AutorDto.
     *
     * @param int|null $CodAu Código identificador do autor (pode ser nulo em novos registros).
     * @param string $Nome Título do autor.
     */
    public function __construct(
        public ?int $CodAu,
        public string $Nome,
    ) {}

    /**
     * Cria um DTO a partir de um array de dados.
     *
     * @param array $autor Array associativo contendo os dados do autor.
     * @return self Instância de AutorDto criada com base nos dados fornecidos.
     */
    public static function fromArray(array $autor): self
    {
        return new self(
            $autor['CodAu'] ?? null,
            $autor['Nome']
        );
    }

    /**
     * Converte o DTO em um array associativo.
     *
     * @return array Dados do autor em formato de array.
     */
    public function toArray(): array
    {
        return [
            'CodAu' => $this->CodAu,
            'Nome' => $this->Nome,
        ];
    }
}
