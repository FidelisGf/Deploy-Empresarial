<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_Penalidade extends Model
{
    protected $table = 'HISTORICO_PENALIDADES';
    protected $primaryKey = 'ID';
    protected $generator = 'GEN_HISTORICO_PENALIDADES_ID';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['ID', 'VALOR_ATUAL', 'VALOR_ORIGINAL', 'DT_PAGAMENTO', 'ID_PENALIDADE'];
}
