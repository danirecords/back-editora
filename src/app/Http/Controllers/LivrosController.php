<?php

namespace App\Http\Controllers;

use App\Services\LivroService;
use Illuminate\Http\Request;
use App\Http\Requests\LivroRequest;
use App\DTOs\LivroDto;

/**
 * Class LivrosController
 *
 * Controlador responsável por gerenciar os livros, realizando operações de CRUD.
 *
 * @package App\Http\Controllers
 */
class LivrosController extends Controller
{

     /**
     * @var service Serviço responsável pela lógica de negócios dos livros.
     */
    protected $service;

     /**
     * Construtor do controlador.
     *
     * @param LivroService $service Instância do serviço de livros.
     */
    public function __construct(LivroService $service)
    {
        $this->service = $service;
    }

     /**
     * Exibe a lista de todos os livros.
     *
     * @return \Illuminate\Http\JsonResponse Lista de livros em formato JSON.
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

     /**
     * Cria um novo livro com base nos dados fornecidos.
     *
     * @param LivroRequest $request Requisição validada contendo os dados do livro.
     * @return \Illuminate\Http\JsonResponse Livro criado em formato JSON.
     */
    public function store(LivroRequest $request)
    {
        $dto = LivroDto::fromArray($request->validated());
        $livro = $this->service->create($dto);
        return response()->json($livro, 201);
    }

     /**
     * Exibe um livro específico pelo seu ID.
     *
     * @param int $id ID do livro.
     * @return \Illuminate\Http\JsonResponse Livro encontrado ou mensagem de erro.
     */
    public function show($id)
    {
        $livro = $this->service->getById($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json($livro);
    }

    /**
     * Atualiza os dados de um livro existente.
     *
     * @param LivroRequest $request Requisição validada com os novos dados.
     * @param int $id ID do livro a ser atualizado.
     * @return \Illuminate\Http\JsonResponse Livro atualizado em formato JSON.
     */
    public function update(LivroRequest $request, $id)
    {
        $dto = LivroDto::fromArray($request->validated());
        $livro = $this->service->update($id, $dto);
        return response()->json($livro);
    }

     /**
     * Remove um livro do sistema.
     *
     * @param int $id ID do livro a ser removido.
     * @return \Illuminate\Http\JsonResponse Mensagem de sucesso da exclusão.
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Livro deletado com sucesso']);
    }
}
