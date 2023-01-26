<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    protected $table = 'EMPRESAS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    use SoftDeletes;
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_EMPRESAS_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['NOME', 'CNPJ','ENDERECO', 'EMAIL', 'NOME_FANTASIA',
    'INC_ESTADUAL', 'ICON', 'IMG_FUNDO'];
    protected $dates = ['DELETED_AT', 'CREATED_AT', 'UPDATED_AT'];
    public function category(){
        return $this->hasMany(Category::class, 'ID_EMPRESA', 'ID');
    }
    public function product(){
        return $this->hasManyThrough(Product::class, Category::class, "ID_EMPRESA", "ID_CATEGORIA", "ID");
    }
    public function usuario(){
        return $this->hasMany(Usuario::class, 'EMPRESA_ID', 'ID');
    }
    public function estoque(){
        return $this->hasMany(Estoque::class, 'EMPRESA_ID', 'ID');
    }
    public function pedidos(){
        return $this->hasMany(Pedidos::class, 'ID_EMPRESA', 'ID');
    }
    public function vendas(){
        return $this->hasMany(Venda::class, 'ID_EMPRESA', 'ID');
    }
    public function cliente(){
        return $this->hasMany(Cliente::class, 'ID_EMPRESA', 'ID');
    }
    public function Materiais(){
        return $this->hasMany(Materiais::class, 'ID_EMPRESA', 'ID');
    }
}
