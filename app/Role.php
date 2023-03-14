<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'ROLES';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_ROLES_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'NOME', 'LEVEL'];

    public function user(){
        return $this->belongsToMany(Usuario::class, 'ID_ROLE', 'ID');
    }
}
