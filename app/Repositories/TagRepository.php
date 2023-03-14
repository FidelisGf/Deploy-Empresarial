<?php

namespace App\Repositories;

use App\Events\MakeLog;
use App\Http\Controllers\Help;
use App\Http\Requests\StoreTagValidator;
use App\Tag;
use Illuminate\Http\Request;

class TagRepository
{
    private $model;
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
    public function index(){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $tags = Tag::where('ID_EMPRESA', $empresa->ID)->get();
            return $tags;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function store(StoreTagValidator $request){
        $helper = new Help();
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $validatedData = $request->validated();
            if($validatedData){
                $tag = new Tag();
                $NOME_REAL = "$request->NOME _ $empresa->ID";
                $tag->NOME = $request->NOME;
                $tag->ID_EMPRESA = $empresa->ID;
                $tag->NOME_REAL = $NOME_REAL;
                $helper->startTransaction();
                $tag->save();

                event(new MakeLog("Produto/Tags", "",
                "insert", json_encode($tag), "",
                $tag->ID, $empresa->ID, $user->ID));

                $helper->commit();
                return $tag;
            }
        }catch(\Exception $e){
            $helper->rollbackTransaction();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
