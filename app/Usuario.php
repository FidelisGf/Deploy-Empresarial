<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'USERS';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    const DELETED_AT = 'DELETED_AT';
    protected $fillable = ['NAME', 'EMAIL', 'PASSWORD', 'EMPRESA_ID', 'ID_ROLE',
    'CPF', 'SALARIO', 'IMAGE'];
    protected $rememberTokenName = 'REMEMBER_TOKEN';
    protected $hidden = ['PASSWORD', 'REMEMBER_TOKEN'];
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_USERS_ID';
    protected $keyType = 'integer';
    public $timestamps = true;
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'EMPRESA_ID', 'ID');
    }
    public function role(){
        return $this->hasOne(Role::class, 'ID', 'ID_ROLE');
    }
    public function penalidades(){
        return $this->hasMany(Penalidade::class, 'ID_USER', 'ID');
    }
    public function pedidos(){
        return $this->hasMany(Pedidos::class, 'ID_USER', 'ID');
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    protected $casts = [
        'EMAIL_VERIFIED_AT' => 'datetime',
    ];

}
