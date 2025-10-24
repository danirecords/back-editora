<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Assuntos
 *
 * Modelo Eloquent que representa a tabela "Assuntos" no banco de dados.
 * Cada registro corresponde a um Assunto
 *
 * @package App\Models
 *
 * @property int $CodAs Identificador único do Assunto.
 * @property string $Descricao Título do assunto.
 */

class Assunto extends Model
{
   /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'assuntos';

     /**
     * Nome da chave primária da tabela.
     *
     * @var string
     */
    protected $primaryKey = 'codAs';

    /**
     * Campos que podem ser preenchidos em massa (mass assignment).
     *
     * @var string
     */
      protected $fillable = ['Descricao'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'Assunto_codAs', 'Livro_Codl');
    }
}
