<?php

namespace App\Repositories;

use App\Avaliacao;
use App\Cor;
use App\Cor_Produtos;
use App\Empresa;
use App\Estoque;
use App\Events\MakeLog;
use App\Http\Controllers\Help;
use App\Http\Requests\StoreProdutoValidator;
use App\Http\Resources\ProductResource;
use App\Materiais;
use App\Product;
use App\Produtos_Materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRepository
{

    public function __construct()
    {
    }
    public function listAll(Request $request){
        try{
            if($request->filled('opcao')){
                $op = $request->opcao;
                switch ($op){
                    case "Produtos mais baratos":
                        return $this->filterByLowestValue($request);
                        break;
                    case "Produtos mais caros":
                        return $this->filterByExpansiveValue($request);
                        break;
                }
            }else{
                return $this->filterShop($request);
            }
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }

    public function filterByLowestValue(Request $request){
        try{
            if($request->filled('pdf')){
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = DB::table('EMPRESAS')
                ->where('EMPRESAS.ID', $empresa->ID)
                ->join('ESTOQUES', 'ESTOQUES.EMPRESA_ID', '=', 'EMPRESAS.ID')
                ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
                ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=', 'PRODUCTS.ID_CATEGORIA')
                ->join('MEDIDAS', 'MEDIDAS.ID', '=', 'PRODUCTS.ID_MEDIDA')
                ->select('PRODUCTS.ID', 'PRODUCTS.NOME', 'CATEGORIAS.NOME_C',
                'MEDIDAS.NOME_REAL',  'PRODUCTS.VALOR', 'ESTOQUES.QUANTIDADE')
                ->orderBy('PRODUCTS.VALOR', 'asc')
                ->get();

                return $PRODUCTS;
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = Empresa::FindOrFail($empresa->ID)
                ->product()->with([
                    'category' => function($query){
                        $query->select('ID_CATEGORIA', 'NOME_C');
                    }
                ])->orderBy('PRODUCTS.VALOR', 'asc')
                ->paginate(20);

                return $PRODUCTS;
            }
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
                );
        }
    }
    public function filterByExpansiveValue(Request $request){
        try{
            if($request->filled('pdf')){
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = DB::table('EMPRESAS')->where('EMPRESAS.ID', $empresa->ID)
                ->join('ESTOQUES', 'ESTOQUES.EMPRESA_ID', '=', 'EMPRESAS.ID')
                ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
                ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=', 'PRODUCTS.ID_CATEGORIA')
                ->join('MEDIDAS', 'MEDIDAS.ID', '=', 'PRODUCTS.ID_MEDIDA')
                ->select('PRODUCTS.ID', 'PRODUCTS.NOME', 'CATEGORIAS.NOME_C',
                'MEDIDAS.NOME_REAL',  'PRODUCTS.VALOR', 'ESTOQUES.QUANTIDADE')
                ->orderBy('PRODUCTS.VALOR', 'desc')
                ->get();

                return $PRODUCTS;
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;

                $PRODUCTS = Empresa::FindOrFail($empresa->ID)
                ->product()
                ->with([
                    'category' => function($query){
                        $query->select('ID_CATEGORIA', 'NOME_C');
                    }
                ])->orderBy('PRODUCTS.VALOR', 'desc')
                ->paginate(20);

                return $PRODUCTS;
            }
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }

    public function filterShop(Request $request){
        $flag = true;
        $search = $request->search;
        $ID = 0;
        if($request->filled('Shop')){
            $ID = DB::table('INTERNET')
            ->select('INTERNET.ID_EMPRESA')
            ->where('INTERNET.STATUS', '=', 1)
            ->first();
            $ID = $ID->ID_EMPRESA;
        }else{
            $user = auth()->user();
            $empresa = $user->empresa;
            $ID = $empresa->ID;
        }
        $PRODUCTS = DB::table('EMPRESAS')->where('EMPRESAS.ID', $ID)
        ->join('ESTOQUES', 'ESTOQUES.EMPRESA_ID', '=', 'EMPRESAS.ID')
        ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
        ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=', 'PRODUCTS.ID_CATEGORIA')
        ->selectRaw('CATEGORIAS.ID_CATEGORIA, CATEGORIAS.NOME_C, PRODUCTS.ID, PRODUCTS.NOME,
        PRODUCTS.VALOR, sum(ESTOQUES.QUANTIDADE) as QUANTIDADE');
        if($request->filled('search')){
            $tmp = Product::where('NOME', $search)->first();
            if($tmp === null || empty($tmp)){
                $wordFragments = explode(" ", $search);
                if(count($wordFragments) >= 2){
                    $PRODUCTS = $PRODUCTS->where('PRODUCTS.NOME', 'LIKE', '%'. $wordFragments[0].'%');
                    for($i = 1; $i < count($wordFragments); $i++){
                        $PRODUCTS = $PRODUCTS->orWhere('PRODUCTS.NOME', 'LIKE', '%'. $wordFragments[$i].'%');
                    }
                }else{
                    $search = ucfirst($search);
                    $PRODUCTS = $PRODUCTS->where('PRODUCTS.NOME', 'LIKE', '%'. $search.'%');
                }
            }else{
                $PRODUCTS = $PRODUCTS->where('PRODUCTS.NOME', '=', $search);
            }

        }
        if($request->filled('Shop')){
            $PRODUCTS = $PRODUCTS->addselect('PRODUCTS.IMAGE', 'PRODUCTS.DESC')
            ->where('ESTOQUES.QUANTIDADE', '>', 0)
            ->groupByRaw('CATEGORIAS.ID_CATEGORIA, CATEGORIAS
            .NOME_C, PRODUCTS.ID, PRODUCTS.NOME,PRODUCTS.VALOR,PRODUCTS.DESC,PRODUCTS.IMAGE');
        }
        if($request->filled('Precos')){
            switch($request->Precos){
                case 1:
                    $PRODUCTS = $PRODUCTS
                    ->whereBetween('PRODUCTS.VALOR', [floatval(1), floatval(25)]);
                    break;
                case 2:
                    $PRODUCTS = $PRODUCTS
                    ->whereBetween('PRODUCTS.VALOR', [floatval(25), floatval(50)]);
                    break;
                case 3:
                    $PRODUCTS = $PRODUCTS
                    ->whereBetween('PRODUCTS.VALOR', [floatval(50), floatval(100)]);
                    break;
                case 4:
                    $PRODUCTS->where('PRODUCTS.VALOR', '>', floatval(100));
                    break;
                case 0:
                    break;
            }
        }
        if($request->filled('categoria')){
            $PRODUCTS = $PRODUCTS->where('CATEGORIAS.ID_CATEGORIA', '=', $request->categoria);
        }
        if(!$request->filled('Shop')){
            $PRODUCTS = $PRODUCTS->groupByRaw('CATEGORIAS.ID_CATEGORIA,
            CATEGORIAS
            .NOME_C, PRODUCTS.ID, PRODUCTS.NOME, PRODUCTS.VALOR');
        }

        $PRODUCTS = $PRODUCTS
        ->orderBy('ID', 'asc')->paginate(15);
        foreach($PRODUCTS as $p){
            $p->isActive = false;
        }
        return $PRODUCTS;
    }

    public function findAllProductByCategory($id){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            $PRODUCTS = DB::table('EMPRESAS')->where('EMPRESAS.ID', $empresa->ID)
            ->join('ESTOQUES', 'ESTOQUES.EMPRESA_ID', '=', 'EMPRESAS.ID')
            ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
            ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=',
            'PRODUCTS.ID_CATEGORIA')
            ->select('CATEGORIAS.ID_CATEGORIA', 'CATEGORIAS.NOME_C',
            'PRODUCTS.ID','PRODUCTS.NOME', 'PRODUCTS.VALOR',
            'ESTOQUES.QUANTIDADE')
            ->where('CATEGORIAS.ID_CATEGORIA', $id)
            ->paginate(20);

            return $PRODUCTS;
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ]
            );
        }
    }
    public function show($id){
        try{
            $PRODUCTS = Product::where('ID', $id)
            ->with(['category' => function($query){
                $query->select('ID_CATEGORIA', 'NOME_C');
                }
            ])->with(['medida' => function($query){
                $query->select('ID', 'NOME');
            }])->firstOrFail();
            $materias = collect(new Materiais());
            foreach($PRODUCTS->materias as $matItem){
                $qntd = $matItem->QUANTIDADE;
                $valor = $matItem->VALOR;
                $matItem = Materiais::FindOrFail($matItem->ID_MATERIA);
                $matItem->QUANTIDADE = $qntd;
                $matItem->VALOR = $valor;
                $materias->push($matItem);
            }
            $PRODUCTS->ESTOQUE = Estoque::where('PRODUCT_ID', $PRODUCTS->ID)
            ->sum('QUANTIDADE');
            $coresEscolhidas = DB::table('CORES_PRODUTOS')
            ->where('CORES_PRODUTOS.ID_PRODUTO', '=', $PRODUCTS->ID)
            ->get();
            $cores = collect(new Cor());
            foreach($coresEscolhidas as $c){
                $c = Cor::FindOrFail($c->ID_COR);

                $c->ESTOQUE = Estoque::where('PRODUCT_ID', '=', $id)
                ->where('COR', '=', $c->HASH)
                ->first();

                $c->ESTOQUE = $c->ESTOQUE->QUANTIDADE;
                $cores->push($c);
            }

            $PRODUCTS->IMAGE = "data:image/png;base64,$PRODUCTS->IMAGE";
            $PRODUCTS->CORES = $cores;
            $PRODUCTS->MATERIAS = $materias;
            $avaliacoes = Avaliacao::where('ID_PRODUTO', $PRODUCTS->ID)
            ->sum('NOTA');
            $countAva = Avaliacao::where('ID_PRODUTO', $PRODUCTS->ID)
            ->count();
            $media = 0;
            if($countAva > 0){
                $media = floatval($avaliacoes / $countAva);
            }

            $PRODUCTS->AVALIACAO = $media;
            return response()->json($PRODUCTS);
        }catch(\Exception $e){
            return response()->json(
                $e->getMessage(), 400
            );
        }
    }
    public function store(StoreProdutoValidator $request){
        $user = auth()->user();
        $empresa = $user->empresa;
        try{
            $helper = new Help();
            $helper->startTransaction();
            $validatedData = $request->validated();
            if($validatedData){
                $produto = new Product();
                $produto->NOME = $request->NOME;
                $produto->DESC = $request->DESC;
                $produto->VALOR = $request->VALOR;
                $produto->ID_CATEGORIA = $request->ID_CATEGORIA;
                $produto->ID_MEDIDA = $request->ID_MEDIDA;
                $cores = json_decode($request->CORES);
                $image = base64_encode(file_get_contents($request->file('IMAGE')->path()));
                $produto->IMAGE = $image;
                $produto->save();
                $estoque = new EstoqueRepository();
                foreach($cores as $c){
                    $cor = new Cor_Produtos();
                    $cor->ID_COR = $c->ID;
                    $estoque->storeProdutoInEstoque($produto->ID, $c->QNTD, $c->HASH);
                    $cor->ID_PRODUTO = $produto->ID;
                    $cor->save();
                }
                $materias = collect(new Materiais());

                $MATERIAIS = json_decode($request->MATERIAIS);
                foreach($MATERIAIS as $material){
                    $produto_material = new Produtos_Materias();
                    $materia = (object) $material;
                    $produto_material->ID_PRODUTO = $produto->ID;
                    $produto_material->ID_MATERIA = $materia->ID;
                    $produto_material->QUANTIDADE = $materia->QUANTIDADE;
                    $produto_material->CUSTO = $materia->CUSTO;
                    $produto_material->save();
                    $materias->push($materia);
                }
                $mtController = new MateriaisRepository();
                if($produto){
                    $quantidade = $request->quantidade_inicial;
                    $mtController->removeQuantidadeMaterial($materias, $quantidade);
                    $helper->commit();
                    return response()->json(
                        $image
                    );
                }
            }
        }catch(\Exception $e){
            $helper->rollbackTransaction();
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function getOneColorOfProduct($id){ // usado para pegar a cor padr??o de um item
        try{
            // $cor = DB::table('CORES_PRODUTOS')
            // ->where('CORES_PRODUTOS.ID_PRODUTO', '=', $id)
            // ->join('CORES', 'CORES.ID' , '=', 'CORES_PRODUTOS.ID_COR')
            // ->join('ESTOQUES', 'ESTOQUES.COR', '=', 'CORES.HASH')
            // ->where('ESTOQUES.QUANTIDADE', '>=', 1)
            // ->get();

            $cor = Cor_Produtos::where('ID_PRODUTO', '=', $id)
            ->join('CORES', 'CORES.ID', '=', 'ID_COR')
            ->join('ESTOQUES', 'ESTOQUES.COR', '=', 'CORES.HASH')
            ->where('ESTOQUES.QUANTIDADE', '>=', 1)
            ->distinct('CORES.ID')
            ->select('CORES.HASH')
            ->get();

            return $cor;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }



    public function update(StoreProdutoValidator $request, $id){
        try{
            $PRODUCT = Product::FindOrFail($id);
            $tmp = $PRODUCT;
            $PRODUCT->update($request->all());
            return response()->json(
                [
                    "message" => "Produto editado com sucesso"
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
    public function destroy($id){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            $estoque = Estoque::where('EMPRESA_ID', $user->empresa->ID)
            ->where('PRODUCT_ID', $id);

            $estoque->delete();
            $PRODUCT = Product::where('ID',$id)->first();

            event(new MakeLog("Produtos", "", "delete", "",
            json_encode($PRODUCT), $PRODUCT->ID, $empresa->ID, $user->ID));

            $PRODUCT->delete();
            return response()->json(
                [
                    "message" => "Produto excluido com sucesso !"
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
    public function findLucroByProduto($id){
        try{
            $user = auth()->user();
            $produto = Product::FindOrFail($id);
            $lucro = $produto->VALOR; // 30000
            $lucroPrct = 0;
            foreach($produto->materias as $matItem){
                $qntd = $matItem->QUANTIDADE; //1
                $custo = $matItem->CUSTO; //5
                $matItem = Materiais::FindOrFail($matItem->ID_MATERIA);
                $matItem->QUANTIDADE = $qntd;
                $matItem->CUSTO = $custo;
                $lucroPrct += ($matItem->CUSTO * $matItem->QUANTIDADE);
                $lucro -= ($matItem->CUSTO * $matItem->QUANTIDADE);
            }
            $lucroPrct = ($lucroPrct * 100) / $produto->VALOR;
            $lucroPrct = 100 - $lucroPrct;
            return response()->json(['lucro' => $lucro, 'porcentagem' => $lucroPrct]);
        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
    public function search(Request $request){
        try{

            $search = $request->search;
            $search = ucwords($search);
            $result = Product::where('NOME', '=', $search)->first();
            if($result === null || empty($result)){

                $result = Product::where('NOME', 'LIKE', '%'. $search.'%')
                ->paginate(20);

            }
            if($request->filled('Shop')){
                foreach($result as $p){
                    $p->IMAGE = "data:image/png;base64,$p->IMAGE";
                }
            }

            return $result;

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
                );
        }
    }
    public function descontaQuantidadeMaterial($id, $quantidade){
        try{
            $user = auth()->user();
            $product = Product::FindOrFail($id);
            foreach($product->materias as $matItem){
                $qntd = $matItem->QUANTIDADE;
                $matItem = Materiais::FindOrFail($matItem->ID_MATERIA);
                $matItem->QUANTIDADE = $qntd;
                $matItem->QUANTIDADE -= ($matItem->QUANTIDADE * $quantidade);
                if($matItem->QUANTIDADE == 0){
                    return false;
                }else{
                    $matItem->save();
                }
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    public function getProdutosDestaques(Request $request){
        try{
            if($request->filled('Shop')){
                $ID = DB::table('INTERNET')
                ->select('INTERNET.ID_EMPRESA')
                ->where('INTERNET.STATUS', '=', 1)
                ->first();
                $ID = $ID->ID_EMPRESA;
            }else{
                $ID = auth()->user()->empresa->ID;

            }
            $PRODUCTS = DB::table('EMPRESAS')->where('EMPRESAS.ID', $ID)
            ->join('ESTOQUES', 'ESTOQUES.EMPRESA_ID', '=', 'EMPRESAS.ID')
            ->join('PRODUCTS', 'PRODUCTS.ID', '=', 'ESTOQUES.PRODUCT_ID')
            ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=',
            'PRODUCTS.ID_CATEGORIA')
            ->join('AVALIACAO', 'AVALIACAO.ID_PRODUTO', '=', 'PRODUCTS.ID')
            ->selectRaw('CATEGORIAS.ID_CATEGORIA, CATEGORIAS.NOME_C,
            PRODUCTS.ID, PRODUCTS.NOME, PRODUCTS.VALOR,  sum(ESTOQUES.QUANTIDADE)
            as QUANTIDADE, PRODUCTS.IMAGE, PRODUCTS.DESC,
            sum(ESTOQUES.SAIDAS) as SAIDAS, AVALIACAO.NOTA,
            (sum(AVALIACAO.NOTA) / count(AVALIACAO.NOTA)) as media')
            ->where('ESTOQUES.QUANTIDADE', '>', 0)
            ->groupByRaw('CATEGORIAS.ID_CATEGORIA, CATEGORIAS
            .NOME_C, PRODUCTS.ID, PRODUCTS.NOME,PRODUCTS.VALOR,
            PRODUCTS.DESC,PRODUCTS.IMAGE,
            AVALIACAO.NOTA')
            ->orderByRaw('SAIDAS desc, AVALIACAO.NOTA')
            ->paginate(12);
            return $PRODUCTS;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function countProducts(){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;

            return DB::table('PRODUCTS')
            ->join('CATEGORIAS', 'CATEGORIAS.ID_CATEGORIA', '=',
            'PRODUCTS.ID_CATEGORIA')
            ->where('CATEGORIAS.ID_EMPRESA', '=', $empresa->ID)
            ->where('PRODUCTS.DELETED_AT', '=', null)
            ->count();

        }catch(\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage()
                ],400
            );
        }
    }
}
