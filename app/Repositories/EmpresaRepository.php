<?php

namespace App\Repositories;

use App\Empresa;
use App\Http\interfaces\EmpresaInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpresaRepository implements EmpresaInterface
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        try{
            $EMPRESAS = Empresa::paginate(3)->toArray();
            return $EMPRESAS;
            //return response()->json(Empresa::all());
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function getEmpresaFromUser(Request $request){
        try{
            if($request->filled('Shop')){
                $ID = DB::table('INTERNET')
                ->select('INTERNET.ID_EMPRESA')
                ->where('INTERNET.STATUS', '=', 1)
                ->first();
                $ID = $ID->ID_EMPRESA;
                $empresa = Empresa::findOrFail($ID);
                return $empresa->NOME_FANTASIA;

            }else{
                $user = auth()->user();
                $empresa = $user->empresa;
                return $empresa;
            }

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function store(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'NOME' => 'required|unique:EMPRESAS|max:50|min:2',
                    'CNPJ' => 'required|unique:EMPRESAS|max:14|min:14',
                    'EMAIL'=> 'required|unique:EMPRESAS|email|max:120|min:5',
                    'NOME_FANTASIA' => 'required|max:60|min:2',
                    'ENDERECO' => 'required|max:255|min:2',
                    'INC_ESTADUAL' => 'required|unique:EMPRESAS|max:12|min:9',
                ]);
                if(!$validator->fails()){
                    if(Empresa::create($request->all())){
                        return response()->json([
                            "message" => "Empresa criada com sucesso"
                        ],200);
                    }else{
                        return false;
                    }
                }
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function show($id)
    {
        try{
            return Empresa::FindOrFail($id);

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function edit($id)
    {
        try{
            return Empresa::FindOrFail($id);
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function updateConfigSite(Request $request){
        try{
            $empresa = auth()->user()->empresa->ID;
            $empresa = Empresa::where('ID', '=', $empresa)->first();
            if($request->has('FUNDO')){
                $image = base64_encode(file_get_contents($request->file('FUNDO')->path()));
                $empresa->IMG_FUNDO = $image;
            }
            if($request->has('ICON')){
                $image2 = base64_encode(file_get_contents($request->file('ICON')->path()));
                $empresa->ICON = $image2;
            }
            $empresa->save();
            if($request->filled('CORES')){
                $temas = new TemaEmpresaRepository();
                return $temas->setTema($request);
            }else{
                return response()->json(['message' => 'Editado com sucesso !']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function setConfigSite(Request $request){
        try{
            $empresa = auth()->user()->empresa->ID;
            $empresa = Empresa::where('ID', '=', $empresa)->first();
            if($request->has('FUNDO')){
                $image = base64_encode(file_get_contents($request->file('FUNDO')->path()));
                $empresa->IMG_FUNDO = $image;
            }
            if($request->has('ICON')){
                $image2 = base64_encode(file_get_contents($request->file('ICON')->path()));
                $empresa->ICON = $image2;
            }
            $empresa->save();
            return response()->json(['message' => 'salvo com sucesso']);

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function update(Request $request, $id)
    {
        try{
            $Empresa = Empresa::FindOrFail($id);
            $Empresa->update($request->all());
            return response()->json(
                [
                    "message" => "Empresa editada com sucesso"
                ],200
                );
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
                );
        }

    }
    public function destroy($id)
    {
        try{
            Empresa::FindOrFail($id)->delete();
            return response()->json([
                "message" => "Empresa Deletada com sucesso !"
            ],200);
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }

    public function getConfigSite(Request $request){
        try{
            if($request->filled('Shop')){
                $ID = DB::table('INTERNET')
                ->select('INTERNET.ID_EMPRESA')
                ->where('INTERNET.STATUS', '=', 1)
                ->first();
                $ID = $ID->ID_EMPRESA;
                $empresa = Empresa::findOrFail($ID);
            }else{
                $empresa = auth()->user()->empresa;
            }

            if($empresa->IMG_FUNDO != null){
                $empresa->IMG_FUNDO = "data:image/png;base64,$empresa->IMG_FUNDO";
            }
            if($empresa->ICON != null){
                $empresa->ICON = "data:image/png;base64,$empresa->ICON";
            }

            return response()->json(["fundo" => $empresa->IMG_FUNDO,
            "icon" => $empresa->ICON]);
        }catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()],400);
        }
    }
}
