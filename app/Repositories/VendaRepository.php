<?php

namespace App\Repositories;

use App\Despesa;
use App\Materiais;
use App\Pedidos;
use App\Product;
use App\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class VendaRepository
{
    private $model;
    public function __construct(Venda $model)
    {
        $this->model = $model;
    }
    public function index(Request $request){
        if($request->filled('opcao')){
            $op = $request->opcao;
            switch($op){
                case "Vendas por periodo de dias":
                    return $this->getVendasByDate($request);
                    break;
                case "Vendas por Tipo de Pagamento":
                    return $this->getVendasByTipoPagamento($request);
                    break;
                case "Lucros e Gastos por dias" :
                    return $this->getLucroAndGastos($request);
                    break;
            }
        }
    }
    public function getVendasPorDia()
    {
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $startData =  date_create('today');
            $endData = date_create('today 23:00');
            $vendas = DB::table('VENDAS')
            ->join('PEDIDOS', function ($joins) use($empresa){
                $joins->on('VENDAS.ID_PEDIDO', '=', 'PEDIDOS.ID')
                ->where('VENDAS.ID_EMPRESA', '=', $empresa->ID);
            })->whereBetween('PEDIDOS.DT_PAGAMENTO', [$startData, $endData])
            ->select('VENDAS.VALOR_TOTAL');
            $v[0] = floatval( $vendas->min('VENDAS.VALOR_TOTAL') );
            $v[1] = floatval( $vendas->avg('VENDAS.VALOR_TOTAL') );
            $v[2] = floatval( $vendas->max('VENDAS.VALOR_TOTAL') );
            $v[3] = floatval( $vendas->sum('VENDAS.VALOR_TOTAL'));
            $qntd = intval($vendas->count());
            return response()->json(["values" => $v, "quantidade" => $qntd]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }
    public function getVendasByDate(Request $request){
        try{
            $startData = Carbon::parse($request->start);
            $endData = Carbon::parse($request->end);
            $user = auth()->user();
            $empresa = $user->empresa;
            $vendas = DB::table('VENDAS')->join('PEDIDOS', function ($joins) use($empresa){
                $joins->on('VENDAS.ID_PEDIDO', '=', 'PEDIDOS.ID')
                ->where('VENDAS.ID_EMPRESA', '=', $empresa->ID);
            })->whereBetween('PEDIDOS.DT_PAGAMENTO', [$startData, $endData])
            ->select('VENDAS.ID', 'VENDAS.VALOR_TOTAL', 'VENDAS.ID_PEDIDO',
            'PEDIDOS.METODO_PAGAMENTO', 'PEDIDOS.DT_PAGAMENTO');
            if($request->filled('pdf')){
                $vlTotal_vendas = 0;
                $vendas = $vendas->get();
                foreach($vendas as $venda){
                    $vlTotal_vendas += $venda->VALOR_TOTAL;
                    $venda->DT_PAGAMENTO = Carbon::parse($venda->DT_PAGAMENTO)
                    ->format('d / m / Y :  H:i');
                }
            return response()->json(["dados" => $vendas, "vlTotal" => $vlTotal_vendas]);
            }else{
                $vendas = $vendas->paginate(8);
                foreach($vendas as $venda){
                    $venda->DT_PAGAMENTO = Carbon::parse($venda->DT_PAGAMENTO)
                    ->format('d m Y H:i');
                }
                return $vendas;
            }
            return $vendas;
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }
    public function getLucroAndGastos(Request $request){
        try{
            $startData = Carbon::parse($request->start);
            $endData = Carbon::parse($request->end);
            $user = auth()->user();
            $empresa = $user->empresa;

            $vlGastosDespesas = Despesa::where('ID_EMPRESA', $empresa->ID)
            ->whereBetween('DATA', [$startData, $endData])
            ->sum('CUSTO');

            $vlTotal_vendas = 0;
            $vlReal = 0;
            $vendas = DB::table('VENDAS')->join('PEDIDOS', function ($joins) use($empresa){
                $joins->on('VENDAS.ID_PEDIDO', '=', 'PEDIDOS.ID')
               ->where('VENDAS.ID_EMPRESA', '=', $empresa->ID);
             })->whereBetween('PEDIDOS.DT_PAGAMENTO', [$startData, $endData])
             ->join('PEDIDOS_ITENS', 'PEDIDOS_ITENS.ID_PEDIDO', '=', 'PEDIDOS.ID')->
             join('PRODUCTS', 'PRODUCTS.ID', '=', 'PEDIDOS_ITENS.ID_PRODUTO')->
            join('PRODUTOS_MATERIAS', 'PRODUTOS_MATERIAS.ID_PRODUTO', '=', 'PRODUCTS.ID')->
            join('MATERIAIS' , 'MATERIAIS.ID', '=', 'PRODUTOS_MATERIAS.ID_MATERIA')->
            select(DB::raw ("VENDAS.ID as ID_VENDA, MATERIAIS.ID as ID_MATERIAL,
            MATERIAIS.CUSTO as CUSTO_MATERIAL,
            PRODUTOS_MATERIAS.QUANTIDADE as
            QUANTIDADE_MATERIA, PRODUCTS.NOME, PEDIDOS_ITENS.VALOR as VALOR_PRODUTO,
            PEDIDOS_ITENS.QUANTIDADE as QUANTIDADE_PRODUTO,PEDIDOS.ID as ID_PEDIDO, VENDAS.VALOR_TOTAL"))
            ->distinct(DB::raw("ID_VENDA"))->get();
            $totalGastosSalarios = floatval(DB::table('PAGAMENTOS_SALARIOS')
            ->whereBetween('PAGAMENTOS_SALARIOS.DATA', [$startData, $endData])
            ->where('PAGAMENTOS_SALARIOS.ID_EMPRESA', '=', $empresa->ID)
            ->sum('PAGAMENTOS_SALARIOS.VALOR_PAGO'));
            foreach($vendas as $v){
                $vlTotal_vendas += $v->VALOR_TOTAL;
                $vlReal += (($v->VALOR_PRODUTO - ( $v->CUSTO_MATERIAL * $v->QUANTIDADE_MATERIA))
                * $v->QUANTIDADE_PRODUTO);
            }
            $saldoFinal = ($vlReal - ($vlGastosDespesas + $totalGastosSalarios));
            return response()->json(["Total" => $vlTotal_vendas, "Lucro_Vendas"
            => $vlReal, "Despesas" => $vlGastosDespesas,
            "Saldo_Final" => $saldoFinal, "Funcionarios" => $totalGastosSalarios]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }
    public function getVendasByTipoPagamento(Request $request){ // fazer somente na query sql
        try{
            $startData = Carbon::parse($request->start);
            $endData = Carbon::parse($request->end);
            $user = auth()->user();
            $empresa = $user->empresa;

            $vendas = DB::table('VENDAS')->join('PEDIDOS', function ($joins) use($empresa){
                $joins->on('VENDAS.ID_PEDIDO', '=', 'PEDIDOS.ID')
                ->where('VENDAS.ID_EMPRESA', '=', $empresa->ID);
            })->whereBetween('PEDIDOS.DT_PAGAMENTO', [$startData, $endData])
            ->select(DB::raw('sum(PEDIDOS.VALOR_TOTAL) as valores'))
            ->groupBy('PEDIDOS.METODO_PAGAMENTO')
            ->orderBy('PEDIDOS.METODO_PAGAMENTO', 'asc')
            ->get();

            return response()->json($vendas);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }
    public function getTotalVendasInTheLastThreeMonths(){
        try{
            $date =  date_create('today 23:00')->format('Y-m-d H:i');
            $hoje = date('d');
            $hoje = strval(60 + $hoje);
            $dateIni = date_create("-$hoje days")->format('Y-m-d H:i');

            $meses = DB::table('PEDIDOS')
            ->where('PEDIDOS.DT_PAGAMENTO', '!=', null)
            ->whereBetween('PEDIDOS.DT_PAGAMENTO', [$dateIni, $date])
            ->select(DB::raw('extract (MONTH from PEDIDOS.DT_PAGAMENTO) as mes,
            sum(PEDIDOS.VALOR_TOTAL) as valores'))
            ->groupBy(DB::raw('mes'))
            ->get();

            $valores = [];
            foreach($meses as $mes){
                $valores[] = floatval( $mes->VALORES );
            }
            return response()->json([$valores]);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }

}
