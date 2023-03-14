<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema_Empresa extends Model
{
    protected $table = 'TEMAS_EMPRESAS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_TEMAS_EMPRESAS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'PRIMARIA', 'SECUNDARIA',
    'ID_EMPRESA', 'NAVBAR', 'FOOTER', 'FILTROS',
    'CARDS_PERFIL', 'CARD_PEDIDOS'];


}
