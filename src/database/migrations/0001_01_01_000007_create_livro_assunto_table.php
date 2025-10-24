<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livro_assunto', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Assunto_codAs');

            // Definindo chaves estrangeiras corretamente
            $table->foreign('Livro_Codl')
                  ->references('Codl')->on('livros')
                  ->onDelete('cascade');

            $table->foreign('Assunto_codAs')
                  ->references('CodAs')->on('assuntos')
                  ->onDelete('cascade');

            $table->primary(['Livro_Codl', 'Assunto_codAs']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livro_assunto');
    }
};
