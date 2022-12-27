<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'VENDAS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_VENDAS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'VALOR_TOTAL', 'ID_PEDIDO', 'ID_EMPRESA'];

    public function pedido(){
        return $this->hasOne(Pedidos::class, 'ID_PEDIDO', 'ID');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'ID_EMPRESA', 'ID');
    }

}
