<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'AVALIACAO';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_AVALIACAO_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['NOTA', 'ID_PRODUTO', 'ID_USER'];
}
