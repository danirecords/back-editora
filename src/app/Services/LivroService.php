<?php

namespace App\Services;

use App\Models\Livros;
use App\DTOs\LivroDto;
use App\DTOs\AutorDto;
use App\DTOs\AssuntoDto;

class LivroService
{
    public function getAll()
    {
        return Livros::with(['autores', 'assuntos'])->get();
    }

    public function getAllWithAutores()
    {
        return Livros::with('autores')->get();
    }

    public function getById(int $id)
    {
        return Livros::with(['autores', 'assuntos'])->find($id);
    }

    public function getByIdWithRelations(int $id)
    {
        return Livros::with(['autores', 'assuntos'])->find($id);
    }

    public function create(LivroDto $dto, array $autores = [], array $assuntos = [])
    {
        $livro = Livros::create($dto->toArray());

        if (!empty($autores)) {
            $livro->autores()->sync($autores);
        }

        if (!empty($assuntos)) {
            $livro->assuntos()->sync($assuntos);
        }

        return $livro;
    }

    public function update($id, LivroDto $dto, array $autores = [], array $assuntos = [])
    {
        $livro = Livros::findOrFail($id);
        $livro->update($dto->toArray());

        if (!empty($autores)) {
            $livro->autores()->sync($autores);
        }

        if (!empty($assuntos)) {
            $livro->assuntos()->sync($assuntos);
        }

        return $livro;
    }

    public function delete(int $id)
    {
        $livro = Livros::findOrFail($id);
        $livro->autores()->detach();
        $livro->assuntos()->detach();
        return $livro->delete();
    }
}
