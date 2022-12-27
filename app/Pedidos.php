<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class Pedidos extends Model
{

    protected $table = 'PEDIDOS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PEDIDOS_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['ID', 'METODO_PAGAMENTO',
                          'ID_EMPRESA', 'VALOR_TOTAL', 'APROVADO', 'DT_PAGAMENTO',
                          'ID_CLIENTE', 'ID_USER', 'COMISSAO', 'PG_COMISSAO'];
    public function empresas(){
        return $this->belongsTo(Empresa::class, 'ID_EMPRESA', 'ID');
    }
    public function vendas(){
        return $this->belongsTo(Venda::class, 'ID_PEDIDO', 'ID');
    }
    public function cliente(){
        return $this->hasOne(Cliente::class, 'ID', 'ID_CLIENTE');
    }
    public function itens(){
        return $this->hasMany(Pedido_Itens::class, 'ID_PEDIDO', 'ID');
    }
    public function user(){
        return $this->belongsTo(Usuario::class, 'ID_USER', 'ID');
    }
    protected $dates = ['DELETED_AT'];
}
