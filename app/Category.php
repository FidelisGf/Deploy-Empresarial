<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'CATEGORIAS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    use SoftDeletes;
    protected $primaryKey = 'ID_CATEGORIA';
    protected $generator = 'GEN_CATEGORIAS_ID';
    protected $keyType = 'integer';

    public $timestamps = true;

    public function product(){
        return $this->hasMany(Product::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'ID_EMPRESA', 'ID_CATEGORIA');
    }

    protected $fillable = ['NOME_C', 'ID_EMPRESA', 'NOME_REAL'];
    protected $dates = ['DELETED_AT'];
}
