<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'CUPONS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CUPONS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'ID_EMPRESA', 'DT_EXP', 'DESCONTO'];
}
