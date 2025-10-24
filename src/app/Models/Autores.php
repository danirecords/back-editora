<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Autores
 *
 * Modelo Eloquent que representa a tabela "Autores" no banco de dados.
 * Cada registro corresponde a um Autor
 *
 * @package App\Models
 *
 * @property int $CodAu Identificador único do Autores.
 * @property string $Nome Título do Autor.
 */

class Autores extends Model
{

    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'autores';

     /**
     * Nome da chave primária da tabela.
     *
     * @var string
     */
    protected $primaryKey = 'CodAu';

    /**
     * Campos que podem ser preenchidos em massa (mass assignment).
     *
     * @var string
     */
    protected $fillable = ['Nome'];


}
