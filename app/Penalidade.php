<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penalidade extends Model
{
    protected $table = 'PENALIDADES';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    use SoftDeletes;
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PENALIDADES_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['ID', 'TIPO', 'ID_USER', 'DATA', 'DESC', 'DESCONTO'];
    public function user(){
        return $this->belongsToMany(Usuario::class, 'ID', 'ID');
    }
}
