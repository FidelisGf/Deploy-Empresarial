<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos_Materias extends Model
{
    protected $table = 'PRODUTOS_MATERIAS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PRODUTOS_MATERIAS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'ID_PRODUTO', 'ID_MATERIA', 'QUANTIDADE', 'CUSTO'];
}
