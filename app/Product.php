<?php

namespace App;

use Firebird\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'PRODUCTS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    use SoftDeletes;
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PRODUCTS_ID';
    protected $keyType = 'integer';
    protected $hidden = ['ID_MEDIDA'];
    public function category(){
        return $this->belongsTo(Category::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }
    public function estoque(){
        return $this->belongsTo(Estoque::class, 'PRODUCT_ID', 'ID');
    }
    public function medida(){
        return $this->belongsTo(Medidas::class, 'ID_MEDIDA', 'ID');
    }
    public function materias(){
        return $this->hasMany(Produtos_Materias::class, 'ID_PRODUTO', 'ID');
    }
    public function pedidos(){
        return $this->belongsToMany(Pedido_Itens::class, 'ID_PRODUTO', 'ID');
    }
    public $timestamps = true;

    protected $fillable = ['NOME', 'DESC', 'VALOR',
    'ID_CATEGORIA', 'ID_MEDIDA',
    'CREATED_AT', 'UPDATED_AT', 'IMAGE'];
    protected $dates = ['DELETED_AT', 'CREATED_AT', 'UPDATED_AT'];




}
