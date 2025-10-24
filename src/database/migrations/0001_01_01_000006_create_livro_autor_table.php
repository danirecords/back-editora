<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livro_autor', function (Blueprint $table) {
            $table->unsignedBigInteger('Livro_Codl');
            $table->unsignedBigInteger('Autor_CodAu');

            $table->foreign('Livro_Codl')->references('Codl')->on('livros')->onDelete('cascade');
            $table->foreign('Autor_CodAu')->references('CodAu')->on('autores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_autor');
    }
};
