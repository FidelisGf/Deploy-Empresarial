<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiais extends Model
{
    protected $table = 'MATERIAIS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_MATERIAIS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'NOME_REAL', 'ID_EMPRESA', 'CUSTO', 'QUANTIDADE'];


    public function empresa(){
        return $this->belongsTo(Empresa::class, 'ID_EMPRESA', 'ID');
    }
}
