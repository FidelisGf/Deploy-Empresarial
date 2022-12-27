<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $table = 'DESPESAS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_DESPESAS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'DESC', 'CUSTO', 'ID_EMPRESA', 'ID_TAG', 'DATA'];

    public function Tags(){
        return $this->belongsTo(Tag::class, 'ID_TAG', 'ID');
    }
}
