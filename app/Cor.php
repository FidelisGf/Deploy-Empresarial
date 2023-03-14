<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    protected $table = 'CORES';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CORES_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'HASH'];
}
