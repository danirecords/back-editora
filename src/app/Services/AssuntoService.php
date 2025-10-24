<?php

namespace App\Services;
use App\Models\Assunto;
use App\DTOs\AssuntoDto;

/**
 * Class AssuntoService
 *
 * Serviço responsável por encapsular a lógica de negócios relacionada aos Assuntos.
 * Atua como intermediário entre o controlador e o modelo.
 *
 * @package App\Services
 */
class AssuntoService
{
     /**
     * Retorna todos os Assuntos cadastrados.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Assuntos[]
     */
    public function getAll()
    {
        return Assunto::all();
    }

    /**
     * Busca um assunto pelo seu ID.
     * @param int $id ID do assunto.
     * @return Assunto |null Assunto encontrado ou null se não existir.
     */
    public function getById(int $id)
    {
        return Assunto::find($id);
    }

     /**
     * Cria um novo assunto a partir de um DTO.
     *
     * @param AssuntoDto $dto Objeto DTO contendo os dados do assunto.
     * @return Assunto Assunto criado.
     */
    public function create(AssuntoDto $dto)
    {
        return Assunto::create($dto->toArray());
    }

    /**
     * Atualiza os dados de um assunto existente.
     *
     * @param int $id ID do assunto a ser atualizado.
     * @param AssuntoDto $dto Objeto DTO com os novos dados do assunto.
     * @return Assunto Assunto atualizado.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o assunto não for encontrado.
     */
    public function update($id, AssuntoDto $dto)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->update($dto->toArray());
        return $assunto;
    }

     /**
     * Exclui um assunto pelo seu ID.
     *
     * @param int $id ID do assunto a ser excluído.
     * @return bool|null Retorna true em caso de sucesso, false ou null em caso de falha.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Se o assunto não for encontrado.
     */
    public function delete(int $id)
    {
        $assunto = Assunto::findOrFail($id);
        return $assunto->delete();
    }
}
