<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento_Salario extends Model
{
    protected $table = 'PAGAMENTOS_SALARIOS';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_PAGAMENTOS_SALARIOS_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'VALOR_PAGO', 'TIPO', 'DATA', 'ID_EMPRESA'];
}
