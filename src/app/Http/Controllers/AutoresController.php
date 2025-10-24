<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use App\Http\Requests\AutorRequest;
use App\DTOs\AutorDto;


class AutoresController extends Controller
{

    /**
     * @var service Serviço responsável pela lógica de negócios dos Autores.
     */
    protected $service;

    /**
     * Construtor do controlador.
     *
     * @param AutorService $service Instância do serviço de Autores.
    */
    public function __construct(AutorService $service)
    {
        $this->service = $service;
    }

    /**
     * Exibe a lista de todos os autores.
     *
     * @return \Illuminate\Http\JsonResponse Lista de autores em formato JSON.
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

     /**
     * Cria um novo autor com base nos dados fornecidos.
     *
     * @param AutoresRequest $request Requisição validada contendo os dados do autor.
     * @return \Illuminate\Http\JsonResponse Autor criado em formato JSON.
     */
    public function store(AutorRequest $request)
    {
        $dto = AutorDto::fromArray($request->validated());
        $autor = $this->service->create($dto);
        return response()->json($autor, 201);
    }

    /**
     * Exibe um autor específico pelo seu ID.
     *
     * @param int $id ID do autor.
     * @return \Illuminate\Http\JsonResponse Autor encontrado ou mensagem de erro.
     */
    public function show($id)
    {
        $autor = $this->service->getById($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json($autor);
    }

    /**
     * Atualiza os dados de um autor existente.
     *
     * @param AutorRequest $request Requisição validada com os novos dados.
     * @param int $id ID do autor a ser atualizado.
     * @return \Illuminate\Http\JsonResponse Autor atualizado em formato JSON.
     */
    public function update(AutorRequest $request, $id)
    {
        $dto = AutorDto::fromArray($request->validated());
        $autor = $this->service->update($id, $dto);
        return response()->json($autor);
    }

     /**
     * Remove um autor do sistema.
     *
     * @param int $id ID do autor a ser removido.
     * @return \Illuminate\Http\JsonResponse Mensagem de sucesso da exclusão.
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Autor deletado com sucesso']);
    }
}
