<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'TAGS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_TAGS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'NOME_REAL', 'ID_EMPRESA'];

    public function despesas(){
        return $this->hasMany(Despesa::class, 'ID_TAG', 'ID');
    }
}
