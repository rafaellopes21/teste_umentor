<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'email', 'situacao', 'data_admissao'];

}