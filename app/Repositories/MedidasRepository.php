<?php

namespace App\Repositories;

use App\Events\MakeLog;
use App\Http\interfaces\MedidasInterface;
use App\Http\Requests\StoreMedidaValidator;
use App\Medidas;
use Illuminate\Http\Request;

class MedidasRepository implements MedidasInterface
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            return Medidas::where('ID_EMPRESA', $empresa->ID)
            ->paginate(20);

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function store(StoreMedidaValidator $request)
    {
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $validatedData = $request->validated();
            if($validatedData){
                $medida = new Medidas();
                $NOME_REAL = "$request->NOME _ $empresa->ID";
                $medida->NOME = $request->NOME;
                $medida->ID_EMPRESA = $empresa->ID;
                $medida->NOME_REAL = $NOME_REAL;
                $medida->save();

                event(new MakeLog("Produto/Medidas", "", "insert",
                json_encode($medida), "", $medida->ID, $empresa->ID, $user->ID));

                return response()->json(["message" => "Medida cadastrada com sucesso !"]);
            }
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }

    }

}
