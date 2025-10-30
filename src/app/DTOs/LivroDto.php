<?php

namespace App\DTOs;

/**
 * Class LivroDto
 *
 * Data Transfer Object (DTO) responsável por transportar os dados do livro
 * entre as camadas da aplicação (Controller → Service → Model) de forma estruturada.
 *
 * @package App\DTOs
 */
class LivroDto
{
     /**
     * Cria uma nova instância de LivroDto.
     *
     * @param int|null $Codl Código identificador do livro (pode ser nulo em novos registros).
     * @param string $Titulo Título do livro.
     * @param string $Editora Nome da editora responsável pela publicação.
     * @param int $Edicao Número da edição do livro.
     * @param string $AnoPublicacao Ano de publicação do livro.
     */
    public function __construct(
        public ?int $Codl,
        public string $Titulo,
        public string $Editora,
        public int $Edicao,
        public string $AnoPublicacao,
      //  public array $autores = [],
     //   public array $assuntos = []
    ) {}

    /**
     * Cria um DTO a partir de um array de dados.
     *
     * @param array $livro Array associativo contendo os dados do livro.
     * @return self Instância de LivroDto criada com base nos dados fornecidos.
     */
    public static function fromArray(array $livro): self
    {
        return new self(
            $livro['Codl'] ?? null,
            $livro['Titulo'],
            $livro['Editora'],
            $livro['Edicao'],
            $livro['AnoPublicacao'],
          //  $livro['autores'] ?? [],
          //  $livro['assuntos'] ?? []
        );
    }

    /**
     * Converte o DTO em um array associativo.
     *
     * @return array Dados do livro em formato de array.
     */
    public function toArray(): array
    {
        return [
            'Codl' => $this->Codl,
            'Titulo' => $this->Titulo,
            'Editora' => $this->Editora,
            'Edicao' => $this->Edicao,
            'AnoPublicacao' => $this->AnoPublicacao
        ];
    }
}
