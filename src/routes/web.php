<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;

Route::prefix('livros')->group(function () {

    Route::get('/', [LivrosController::class, 'index'])->name('livros.index');
    Route::post('/', [LivrosController::class, 'store'])->name('livros.store');
    Route::get('{id}', [LivrosController::class, 'show'])->name('livros.show');
    Route::put('{id}', [LivrosController::class, 'update'])->name('livros.update');
    Route::delete('{id}', [LivrosController::class, 'destroy'])->name('livros.destroy');
});
