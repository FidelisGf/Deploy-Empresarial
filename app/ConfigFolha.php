<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigFolha extends Model
{
    protected $table = 'CONFIG_FOLHA';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CONFIG_FOLHA_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'DT_SALARIO', 'DT_ADIANTAMENTO', 'ID_EMPRESA'];
}
