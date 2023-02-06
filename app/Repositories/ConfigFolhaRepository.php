<?php

namespace App\Repositories;

use App\ConfigFolha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ConfigFolhaRepository
{
    public function __construct()
    {
        //
    }
    public function setAjustes(Request $request){
        try{
            $dtPagamento = Carbon::parse($request->DT_PAGAMENTO);
            $dtAdiantamento = Carbon::parse($request->DT_ADIANTAMENTO);
            $empresa = auth()->user()->empresa;

            $config = ConfigFolha::where('ID_EMPRESA', $empresa->ID)
            ->first();

            if($config === null){
                $config = new ConfigFolha();
            }
            $config->DT_SALARIO = $dtPagamento;
            $config->ID_EMPRESA = $empresa->ID;
            if($request->FLAG == true){
                $config->DT_ADIANTAMENTO = $dtAdiantamento;
            }else{
                $config->DT_ADIANTAMENTO = null;
            }
            $config->save();
            return response()->json(['message' =>
            'Configurações de Folha realizadas com sucesso']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function showAjuste(){
        $empresa = auth()->user()->empresa;

        $config = ConfigFolha::where('ID_EMPRESA', $empresa->ID)
        ->first();

        if($config === null){
            $config = new ConfigFolha();
            $config->DT_SALARIO = '';
            $config->DT_ADIANTAMENTO = null;
            return response()->json($config);
        }else{
            return response()->json($config);
        }
    }
}
