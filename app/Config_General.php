<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config_General extends Model
{
    protected $table = 'CONFIG_GENERAL';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CONFIG_GENERAL_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'ESTADO', 'ID_EMPRESA', 'PARAMETRO'];
}
