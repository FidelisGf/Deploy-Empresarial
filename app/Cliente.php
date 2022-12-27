<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table = 'CLIENTES';
    protected $primaryKey = 'ID';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    use SoftDeletes;
    protected $generator = 'GEN_CLIENTES_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['ID', 'NOME', 'CPF', 'ENDERECO', 'TELEFONE', 'EMAIL', 'NOME_REAL', 'ID_EMPRESA'];


    public function pedido(){
        return $this->belongsToMany(Pedidos::class, 'ID_CLIENTE', 'ID');
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'ID_EMPRESA', 'ID');
    }
}
