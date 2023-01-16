<?php

namespace App\Repositories;

use App\Cupom;
use App\Cupom_Users;
use Illuminate\Http\Request;

class CupomRepository
{
    public function __construct()
    {

    }
    public function getCupom(Request $request){
        try{
            $cupom = Cupom::where('NOME', '=', $request->NOME)->first();
            if($cupom == null || empty($cupom)){
                return response()->json(['message' => 'Cupom inválido'], 400);
            }else{
                $user = auth()->user();
                $check = Cupom_Users::where('ID_USER', '=', $user->ID)
                ->where('ID_CUPOM', '=', $cupom->ID)
                ->first();
                if($check == null || empty($check)){
                    return response()->json($cupom);
                }else{
                    return response()->json(['message' => 'Você já utilizou esse cupom !'],400);
                }
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function applyCupom(Request $request){
        try{
            $user = auth()->user();
            $cupom_uso = new Cupom_Users();
            $cupom_uso->ID_USER = $user->ID;
            $cupom_uso->ID_CUPOM = $request->ID;
            $cupom_uso->save();
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
}
