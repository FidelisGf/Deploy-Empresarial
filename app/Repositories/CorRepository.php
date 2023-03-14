<?php

namespace App\Repositories;

use App\Cor;
use Illuminate\Http\Request;

class CorRepository
{
    public function __construct()
    {
        //
    }
    public function index(){
        try{
            $cores = Cor::all();
            return $cores;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function store(Request $request){
        try{
            $cor = new Cor();
            $cor->NOME = $request->NOME;
            $cor->HASH = $request->HASH;
            $cor->save();
            return response()->json(['message' => 'Cor criada com sucesso !']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
}
