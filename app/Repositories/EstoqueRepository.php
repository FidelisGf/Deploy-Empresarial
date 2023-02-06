<?php

namespace App\Repositories;

use App\Estoque;
use App\Events\MakeLog;
use App\Http\Controllers\Help;
use App\Http\interfaces\EstoqueInterface;
use App\Http\Requests\StoreEstoqueValidator;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueRepository implements EstoqueInterface
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        try{
            if($request->filled('opcao')){
                $opcao = $request->opcao;
                switch($opcao){
                    case "Produtos com mais estoque":
                        return $this->filterByBiggerEstoque($request);
                        break;
                    case "Produtos com pouco estoque":
                        return $this->filterByLowerEstoque($request);
                        break;
                    case "Produtos com mais saidas":
                        return $this->filterByProductWithMostSaidas($request);
                        break;
                    case "Disponivel para venda" :
                        return $this->filterByDisponivelParaVenda();
                        break;
                }
            }
            $user = auth()->user();
            $empresa = $user->empresa;

            $PRODUCTS = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
            ->with([
                'product' => function($query){
                    $query->select('ID', 'NOME', 'VALOR', 'DESC');
                }
            ])->paginate(6);

            return $PRODUCTS;
        }catch(\Exception $e){
            return response()->json(['message' => $e],400);
        }
    }
    public function filterByDisponivelParaVenda(){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            $PRODUCTS = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
            ->with([
                'product' => function($query){
                    $query->select('ID', 'NOME', 'VALOR', 'DESC');
                }
            ])->where('QUANTIDADE', '>', 0)
            ->paginate(6);

            return $PRODUCTS;
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()],400);
        }
    }
    public function filterByBiggerEstoque(Request $request){
        try{
            if($request->filled('pdf')){
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = DB::table("ESTOQUES")
                ->where('ESTOQUES.EMPRESA_ID', '=', $empresa->ID)
                ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
                ->select('PRODUCTS.ID',
                'PRODUCTS.NOME', 'PRODUCTS.VALOR', 'ESTOQUES.QUANTIDADE', 'ESTOQUES.SAIDAS')
                ->orderBy('ESTOQUES.QUANTIDADE', 'desc')
                ->get();

                return $PRODUCTS;
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
                ->orderBy('QUANTIDADE', 'desc')
                ->with([
                    'product' => function($query){
                        $query->select('ID', 'NOME', 'VALOR', 'DESC');
                    }
                ])->paginate(5);

                return $PRODUCTS;
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e],400);
        }
    }
    public function storeProdutoInEstoque($product_id, $quantidade, $cor)
    {
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $Estoque = new Estoque();
            $Estoque->PRODUCT_ID = $product_id;
            $Estoque->EMPRESA_ID = $empresa->ID;
            $Estoque->QUANTIDADE = $quantidade;
            $Estoque->COR = $cor;
            if($Estoque->save()){
                return response()->json(['message' =>
                'Produto criado e adicionado ao estoque da empresa'],200);
            }
        }catch(\Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ],400);
        }
    }
    public function addEstoque(StoreEstoqueValidator $request){
        try{
            $validator = $request->validated();
            if($validator){
                $product_id = $request->product_id;
                $quantidade = $request->quantidade;
                $user = auth()->user();
                $empresa = $user->empresa;

                $Estoque = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
                ->where('PRODUCT_ID', '=', $product_id)
                ->first();

                $Estoque->QUANTIDADE += $quantidade;
                $prod = new ProductRepository();
                $check = $prod->descontaQuantidadeMaterial($product_id, $quantidade);
                if($check){
                    $Estoque->save();
                    return response()->json(["message" => 'Estoque Adicionado com successo !']);
                }else{
                    return response()->json(["message" => 'Saldo de Material Insuficiente !'],400);
                }
            }
        }catch(\Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ],400);
        }
    }
    public function removeEstoque($product_id, $quantidade, $cor){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            $Estoque = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
            ->where('PRODUCT_ID', '=', $product_id)
            ->where('COR', '=', $cor)
            ->first();

            $tmp = $Estoque;
            $Estoque->QUANTIDADE -= $quantidade;
            $Estoque->SAIDAS += $quantidade;
            $Estoque->save();

            event(new MakeLog("Estoque/Quantidade", "QUANTIDADE", "update",
            json_encode($Estoque), json_encode($tmp), $Estoque->ID, $empresa->ID, $user->ID));

            return response()->json(['Produto atual no estoque' => $Estoque]);
        }catch(\Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ],400);
        }
    }
    public function filterByLowerEstoque(Request $request){
        try{
            if($request->filled('pdf')){
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = DB::table("ESTOQUES")
                ->where('ESTOQUES.EMPRESA_ID', '=', $empresa->ID)
                ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
                ->select('PRODUCTS.ID','PRODUCTS.NOME', 'PRODUCTS.VALOR',
                'ESTOQUES.QUANTIDADE', 'ESTOQUES.SAIDAS')
                ->orderBy('ESTOQUES.QUANTIDADE', 'asc')
                ->get();

                return $PRODUCTS;
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
                ->orderBy('QUANTIDADE', 'asc')
                ->with([
                    'product' => function($query){
                        $query->select('ID', 'NOME', 'VALOR', 'DESC');
                    }
                ])->paginate(5);

                return $PRODUCTS;
            }

        }catch(\Exception $e){
            return response()->json(['message' => $e],400);
        }
    }
    public function getQuantidadeProduct($id, Request $request){
        try{

            $estoque = Estoque::where('PRODUCT_ID', $id)
            ->where('COR', $request->COR)
            ->firstOrFail();

            return $estoque->QUANTIDADE;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function restauraEstoque($product_id, $quantidade, $cor){
        try{
                $user = auth()->user();
                $empresa = $user->empresa;

                $Estoque = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
                ->where('PRODUCT_ID', '=', $product_id)
                ->where('COR', '=', $cor)
                ->first();

                $Estoque->QUANTIDADE += $quantidade;
                $Estoque->save();
                return response()->json(["message" => 'Estoque Adicionado com successo !']);

        }catch(\Exception $e){
            return response()->json([
                "message" => $e->getMessage()
            ],400);
        }
    }
    public function filterByProductWithMostSaidas(Request $request){
        try{
            if($request->filled('pdf')){
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = DB::table("ESTOQUES")->where('ESTOQUES.EMPRESA_ID', '=', $empresa->ID)
                ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
                ->select('PRODUCTS.ID', 'PRODUCTS.NOME', 'PRODUCTS.VALOR',
                'ESTOQUES.QUANTIDADE', 'ESTOQUES.SAIDAS')
                ->where('ESTOQUES.SAIDAS', '!=', null)
                ->orderBy('ESTOQUES.SAIDAS', 'desc')
                ->get();

                return $PRODUCTS;
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;

                $produtos = Estoque::where('EMPRESA_ID', '=', $empresa->ID)
                ->whereNotNull('SAIDAS')->
                orderBy('SAIDAS', 'desc')
                ->with([
                    'product' => function($query){
                        $query->select('ID', 'NOME', 'VALOR', 'DESC');
                    }
                ])->paginate(6);

                return $produtos;
            }
        }catch(\Exception $e){
            return response()->json(['message', $e->getMessage()],400);
        }
    }


}
