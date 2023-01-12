<?php

namespace App\Repositories;

use App\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoRepository
{
    public function __construct()
    {
        //
    }
    public function store(Request $request){
        try{
            $user = auth()->user();
            $avali = Avaliacao::where('ID_USER', '=', $user->ID)
            ->where('ID_PRODUTO', '=', $request->ID_PRODUTO)
            ->first();
            if($avali == null || empty($avali)){
                $avaliacao = new Avaliacao();
                $avaliacao->NOTA = $request->NOTA;
                $avaliacao->ID_PRODUTO = $request->ID_PRODUTO;
                $avaliacao->ID_USER = $user->ID;
                $avaliacao->save();
            }else{
                $avali->NOTA = $request->NOTA;
                $avali->save();
            }

            return response()->json(['message' => 'Avaliação feita com sucesso !']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
