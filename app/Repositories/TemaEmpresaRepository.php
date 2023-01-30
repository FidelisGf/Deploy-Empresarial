<?php

namespace App\Repositories;

use App\Tema_Empresa;
use Illuminate\Http\Request;
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

    public function setTema(Request $request){
        try{
            $id = auth()->user()->empresa->ID;
            $tema_empresa = Tema_Empresa::where('ID_EMPRESA', $id)->first();
            if($request->has('CORES')){
                $request->CORES = json_decode($request->CORES);
                if(empty($tema_empresa) || $tema_empresa == null){
                    $tema_empresa = new Tema_Empresa();
                }
                if(array_key_exists(0, $request->CORES)){
                    $tema_empresa->PRIMARIA = $request->CORES[0];
                }
                if(array_key_exists(1, $request->CORES)){
                    $tema_empresa->SECUNDARIA = $request->CORES[1];
                }
                if(array_key_exists(2, $request->CORES)){
                    $tema_empresa->NAVBAR =
                    $request->CORES[2];
                }
                if(array_key_exists(3, $request->CORES)){
                    $tema_empresa->FILTROS = $request->CORES[3];
                }

                if(array_key_exists(4, $request->CORES)){
                    $tema_empresa->FOOTER = $request->CORES[4];
                }

                if(array_key_exists(5, $request->CORES)){
                    $tema_empresa->CARDS_PERFIL = $request->CORES[5];
                }

                if(array_key_exists(6, $request->CORES)){
                    $tema_empresa->CARD_PEDIDOS = $request->CORES[6];
                }
                $tema_empresa->save();
                return response()->json(['message' => 'Editado com sucesso !']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }

    }
}
