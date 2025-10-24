<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\AssuntoController;


// Grupo de rotas para livros
Route::prefix('livros')->group(function () {
    // Listar todos os livros
    Route::get('/', [LivrosController::class, 'index'])->name('livros.index');

    // Criar um novo livro
    Route::post('/', [LivrosController::class, 'store'])->name('livros.store');

    // Mostrar um livro específico
    Route::get('{id}', [LivrosController::class, 'show'])->name('livros.show');

    // Atualizar um livro
    Route::put('{id}', [LivrosController::class, 'update'])->name('livros.update');

    // Deletar um livro
    Route::delete('{id}', [LivrosController::class, 'destroy'])->name('livros.destroy');
});

// Grupo de rotas para autores
Route::prefix('autores')->group(function () {
    // Listar todos os autores
    Route::get('/', [AutoresController::class, 'index'])->name('autores.index');

    // Criar um novo autor
    Route::post('/', [AutoresController::class, 'store'])->name('autores.store');

    // Mostrar um autor específico
    Route::get('{id}', [AutoresController::class, 'show'])->name('autores.show');

    // Atualizar um autor
    Route::put('{id}', [AutoresController::class, 'update'])->name('autores.update');

    // Deletar um autor
    Route::delete('{id}', [AutoresController::class, 'destroy'])->name('autores.destroy');
});

// Grupo de rotas para assuntos
Route::prefix('assunto')->group(function () {
    // Listar todos os assuntos
    Route::get('/', [AssuntoController::class, 'index'])->name('assunto.index');

    // Criar um novo assuntor
    Route::post('/', [AssuntoController::class, 'store'])->name('assunto.store');

    // Mostrar um assunto específico
    Route::get('{id}', [AssuntoController::class, 'show'])->name('assunto.show');

    // Atualizar um assunto
    Route::put('{id}', [AssuntoController::class, 'update'])->name('assunto.update');

    // Deletar um assunto
    Route::delete('{id}', [AssuntoController::class, 'destroy'])->name('assunto.destroy');
});
