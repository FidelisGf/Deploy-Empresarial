<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'LOGS';
    protected $primaryKey = 'ID';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    protected $generator = 'GEN_LOGS_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['ID', 'TELA', 'TIPO', 'NOVO_VALOR', 'CAMPO', 'ANTIGO_VALOR', 'ID_ITEM', 'ID_EMPRESA', 'ID_USER', 'CREATED_AT'];
    protected $dates = ['CREATED_AT', 'UPDATED_AT'];

}
