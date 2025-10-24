<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Livros
 *
 * Modelo Eloquent que representa a tabela "livros" no banco de dados.
 * Cada registro corresponde a um livro e mantém relacionamento com autores e assuntos.
 *
 * @package App\Models
 *
 * @property int $Codl Identificador único do livro.
 * @property string $Titulo Título do livro.
 * @property string $Editora Nome da editora responsável pela publicação.
 * @property int $Edicao Número da edição do livro.
 * @property string $AnoPublicacao Ano de publicação do livro.
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Autor[] $autores Autores associados ao livro.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Assunto[] $assuntos Assuntos associados ao livro.
 */
class Livros extends Model
{

    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'livros';

     /**
     * Nome da chave primária da tabela.
     *
     * @var string
     */
    protected $primaryKey = 'Codl';

    /**
     * Campos que podem ser preenchidos em massa (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = ['Titulo', 'Editora', 'Edicao', 'AnoPublicacao'];

    /**
     * Relacionamento muitos-para-muitos entre livros e autores.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'Livro_Codl', 'Autor_CodAu');
    }

    /**
     * Relacionamento muitos-para-muitos entre livros e assuntos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'Livro_Codl', 'Assunto_codAs');
    }
}
