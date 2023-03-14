<?php

namespace App\Repositories;

use App\Http\interfaces\TemaEmpresaInterface;
use App\Tema_Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemaEmpresaRepository
{
    public function __construct()
    {
        //
    }

    public function show(Request $request){
        try{
            if($request->has('Shop')){
                $ID = DB::table('INTERNET')
                ->select('INTERNET.ID_EMPRESA')
                ->where('INTERNET.STATUS', '=', 1)
                ->first();
                $ID = $ID->ID_EMPRESA;
            }else{
                $ID = auth()->user()->empresa->ID;
            }
            $cores = Tema_Empresa::where('ID_EMPRESA', '=', $ID)->first();
            return response()->json($cores);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }

    }
    public function setTema(Request $request){
        try{
            $id = auth()->user()->empresa->ID;
            $tema_empresa = Tema_Empresa::where('ID_EMPRESA', $id)->first();
            if($request->has('CORES')){
                $CORES = json_decode($request->CORES);
                $CAMPOS = ['PRIMARIA', 'SECUNDARIA', 'NAVBAR', 'FILTROS', 'FOOTER', 'CARDS_PERFIL', 'CARD_PEDIDOS'];
                if(empty($tema_empresa) || $tema_empresa == null){
                    $tema_empresa = new Tema_Empresa();
                }
                for($i = 0; $i < sizeof($CAMPOS); $i++){
                    $campo = (string) $CAMPOS[$i];
                    $tema_empresa[$campo] = $CORES[$i];
                }
                $tema_empresa->save();
                return response()->json(['message' => 'Editado com sucesso !']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
