<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPw extends Model
{
    protected $table = 'PW_RESET';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PW_RESET_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'CODIGO', 'EMAIL', 'DT_USO'];

}
