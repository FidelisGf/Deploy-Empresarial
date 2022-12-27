<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'ESTOQUES';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_ESTOQUES_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'PRODUCT_ID', 'EMPRESA_ID', 'QUANTIDADE', 'SAIDAS'];
    public function category(){
        return $this->hasManyThrough(Category::class, Product::class, "ID_CATEGORIA", "PRODUCT_ID", "ID");
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'EMPRESA_ID', 'ID');
    }
    public function product(){
        return $this->hasMany(Product::class, 'ID', 'PRODUCT_ID');
    }
}
