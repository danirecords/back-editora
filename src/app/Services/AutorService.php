<?php

namespace App\Services;
use App\Models\Autores;
use App\DTOs\AutorDto;

/**
 * Class AutorService
 *
 * Serviço responsável por encapsular a lógica de negócios relacionada aos Autores.
 * Atua como intermediário entre o controlador e o modelo.
 *
 * @package App\Services
 */
class AutorService
{
     /**
     * Retorna todos os Autores cadastrados.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Autores[]
     */
    public function getAll()
    {
        return Autores::all();
    }

    /**
     * Busca um autor pelo seu ID.
     * @param int $id ID do autor.
     * @return Autores|null Autor encontrado ou null se não existir.
     */
    public function getById(int $id)
    {
        return Autores::find($id);
    }

     /**
     * Cria um novo autor a partir de um DTO.
     *
     * @param AutorDto $dto Objeto DTO contendo os dados do autor.
     * @return Autores Autor criado.
     */
    public function create(AutorDto $dto)
    {
        return Autores::create($dto->toArray());
    }

    /**
     * Atualiza os dados de um autor existente.
     *
     * @param int $id ID do autor a ser atualizado.
     * @param AutorDto $dto Objeto DTO com os novos dados do autor.
     * @return Autores Autor atualizado.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o autor não for encontrado.
     */
    public function update($id, AutorDto $dto)
    {
        $autor = Autores::findOrFail($id);
        $autor->update($dto->toArray());
        return $autor;
    }

     /**
     * Exclui um autor pelo seu ID.
     *
     * @param int $id ID do autor a ser excluído.
     * @return bool|null Retorna true em caso de sucesso, false ou null em caso de falha.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o autor não for encontrado.
     */
    public function delete(int $id)
    {
        $autor = Autores::findOrFail($id);
        return $autor->delete();
    }
}
