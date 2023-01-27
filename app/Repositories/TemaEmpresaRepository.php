<?php

namespace App\Repositories;

use App\Tema_Empresa;
use Illuminate\Support\Facades\DB;

class TemaEmpresaRepository
{
    public function __construct()
    {
        //
    }

    public function show(){
        $ID = DB::table('INTERNET')
        ->select('INTERNET.ID_EMPRESA')
        ->where('INTERNET.STATUS', '=', 1)
        ->first();
        $ID = $ID->ID_EMPRESA;
        $cores = Tema_Empresa::where('ID_EMPRESA', '=', $ID)->first();
        return response()->json($cores);
    }
}
