<?php

namespace App\Repositories;

use App\Config_General;
use Illuminate\Http\Request;

class ConfigGeneralRepository
{
    public function __construct()
    {
        //
    }
    public function setConfig(Request $request){
        try{
            $empresa = auth()->user()->empresa;
            $config = Config_General::where('NOME', '=', $request->NOME)->first();
            if($config ===null){
                $config = new Config_General();
                $config->NOME = $request->NOME;
                $config->PARAMETRO = $request->PARAMETRO;
            }
            $config->ESTADO = $request->ESTADO;
            $config->ID_EMPRESA = $empresa->ID;
            $config->save();
            return response()->json(['message' => "Configuração de $request->NOME realizadas com sucesso"]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function getConfig(Request $request){
        try{
            $config = Config_General::where('NOME', '=', $request->NOME)->first();
             return response()->json($config);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
