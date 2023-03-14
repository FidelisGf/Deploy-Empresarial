<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor_Produtos extends Model
{
    protected $table = 'CORES_PRODUTOS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CORES_PRODUTOS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'ID_PRODUTO', 'ID_COR'];
}
