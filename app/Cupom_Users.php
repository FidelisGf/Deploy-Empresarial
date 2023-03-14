<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom_Users extends Model
{
    protected $table = 'CUPONS_USERS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_CUPONS_USERS_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    protected $fillable = ['ID', 'ID_USER', 'ID_CUPOM'];
}
