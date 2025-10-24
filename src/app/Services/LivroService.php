<?php

namespace App\Services;
use App\Models\Livros;
use App\DTOs\LivroDto;

/**
 * Class LivroService
 *
 * Serviço responsável por encapsular a lógica de negócios relacionada aos livros.
 * Atua como intermediário entre o controlador e o modelo.
 *
 * @package App\Services
 */
class LivroService
{
     /**
     * Retorna todos os livros cadastrados.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Livros[]
     */
    public function getAll()
    {
        return Livros::all();
    }

    /**
     * Busca um livro pelo seu ID.
     *
     * @param int $id ID do livro.
     * @return Livros|null Livro encontrado ou null se não existir.
     */
    public function getById(int $id)
    {
        return Livros::find($id);
    }

     /**
     * Cria um novo livro a partir de um DTO.
     *
     * @param LivroDto $dto Objeto DTO contendo os dados do livro.
     * @return Livros Livro criado.
     */
    public function create(LivroDto $dto)
    {
        return Livros::create($dto->toArray());
    }

    /**
     * Atualiza os dados de um livro existente.
     *
     * @param int $id ID do livro a ser atualizado.
     * @param LivroDto $dto Objeto DTO com os novos dados do livro.
     * @return Livros Livro atualizado.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o livro não for encontrado.
     */
    public function update($id, LivroDto $dto)
    {
        $livro = Livros::findOrFail($id);
        $livro->update($dto->toArray());
        return $livro;
    }

     /**
     * Exclui um livro pelo seu ID.
     *
     * @param int $id ID do livro a ser excluído.
     * @return bool|null Retorna true em caso de sucesso, false ou null em caso de falha.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o livro não for encontrado.
     */
    public function delete(int $id)
    {
        $livro = Livros::findOrFail($id);
        return $livro->delete();
    }
}
