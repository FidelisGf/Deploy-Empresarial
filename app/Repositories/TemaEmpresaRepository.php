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
                if(empty($tema_empresa) || $tema_empresa == null){
                    $tema_empresa = new Tema_Empresa();
                }
                if(array_key_exists(0, $CORES)){
                    if(!empty($CORES[0]))
                        $tema_empresa->PRIMARIA = $CORES[0];
                }
                if(array_key_exists(1, $CORES)){
                    if(!empty($CORES[1]))
                        $tema_empresa->SECUNDARIA = $CORES[1];
                }
                if(array_key_exists(2, $CORES)){
                    if(!empty($CORES[2]))
                        $tema_empresa->NAVBAR = $CORES[2];
                }
                if(array_key_exists(3, $CORES)){
                    if(!empty($CORES[3]))
                        $tema_empresa->FILTROS = $CORES[3];
                }

                if(array_key_exists(4, $CORES)){
                    if(!empty($CORES[4]))
                        $tema_empresa->FOOTER = $CORES[4];
                }

                if(array_key_exists(5, $CORES)){
                    if(!empty($CORES[5]))
                        $tema_empresa->CARDS_PERFIL = $CORES[5];
                }

                if(array_key_exists(6, $CORES)){
                    if(!empty($CORES[6]))
                        $tema_empresa->CARD_PEDIDOS = $CORES[6];
                }
                $tema_empresa->save();
                return response()->json(['message' => 'Editado com sucesso !']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }

    }
}
