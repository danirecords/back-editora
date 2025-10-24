<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AssuntoService;
use App\Http\Requests\AssuntoRequest;
use App\DTOs\AssuntoDto;


class AssuntoController extends Controller
{

    /**
     * @var service Serviço responsável pela lógica de negócios dos Assuntos.
     */
    protected $service;

    /**
     * Construtor do controlador.
     *
     * @param AssuntoService $service Instância do serviço de Assuntos.
    */
    public function __construct(AssuntoService $service)
    {
        $this->service = $service;
    }

    /**
     * Exibe a lista de todos os assuntos.
     *
     * @return \Illuminate\Http\JsonResponse Lista de assuntos em formato JSON.
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

     /**
     * Cria um novo assunto com base nos dados fornecidos.
     *
     * @param AssuntoRequest $request Requisição validada contendo os dados do assunto.
     * @return \Illuminate\Http\JsonResponse Assunto criado em formato JSON.
     */
    public function store(AssuntoRequest $request)
    {
        $dto = AssuntoDto::fromArray($request->validated());
        $assunto = $this->service->create($dto);
        return response()->json($assunto, 201);
    }

    /**
     * Exibe um assunto específico pelo seu ID.
     *
     * @param int $id ID do autor.
     * @return \Illuminate\Http\JsonResponse Assunto encontrado ou mensagem de erro.
     */
    public function show($id)
    {
        $assunto = $this->service->getById($id);
        if (!$assunto) {
            return response()->json(['message' => 'Assunto não encontrado'], 404);
        }
        return response()->json($assunto);
    }

    /**
     * Atualiza os dados de um assunto existente.
     *
     * @param AssuntoRequest $request Requisição validada com os novos dados.
     * @param int $id ID do assunto a ser atualizado.
     * @return \Illuminate\Http\JsonResponse Assunto atualizado em formato JSON.
     */
    public function update(AssuntoRequest $request, $id)
    {
        $dto = AssuntoDto::fromArray($request->validated());
        $assunto = $this->service->update($id, $dto);
        return response()->json($assunto);
    }

     /**
     * Remove um assunto do sistema.
     *
     * @param int $id ID do assunto a ser removido.
     * @return \Illuminate\Http\JsonResponse Mensagem de sucesso da exclusão.
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Assunto deletado com sucesso']);
    }
}
