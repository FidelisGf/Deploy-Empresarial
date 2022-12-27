<?php

namespace App\Repositories;

use App\Despesa;
use App\Events\MakeLog;
use App\Http\interfaces\DespesaInterface;
use App\Http\Requests\StoreDespesaValidator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DespesaRepository implements DespesaInterface
{
    public function __construct()
    {
        //
    }
    public function index(Request $request)
    {
        try{
            if($request->filled('opcao')){
                $opcao = $request->opcao;
                switch($opcao){
                    case 'Despesas entre duas datas' :
                        return $this->despesaBetweenTwoDates($request);
                        break;
                }
            }else{
                $user = auth()->user();
                $empresa = $user->empresa;
                $despesas = Despesa::where('ID_EMPRESA', $empresa->ID)->with([
                    'Tags' => function($query){
                        $query->select('ID', 'NOME');
                    }
                ])->paginate(6);
                return $despesas;
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function sumDespesasMensais(){
        try{
            $startData = date('Y-m-01');
            $endData = date('Y-m-t');
            $empresa = auth()->user()->empresa;
            $valor = Despesa::where('ID_EMPRESA', $empresa->ID)->whereBetween('DATA', [$startData, $endData])->sum('CUSTO');
            return $valor;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function store(StoreDespesaValidator $request)
    {
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $validatedData = $request->validated();
            if($validatedData){
                $despesa = new Despesa();
                $despesa->DESC = $request->DESC;
                $despesa->ID_EMPRESA = $empresa->ID;
                $despesa->CUSTO = $request->CUSTO;
                $despesa->DATA = Carbon::parse($request->DATA);
                $despesa->ID_TAG = $request->ID_TAG;
                $despesa->save();
                event(new MakeLog("Despesas", "", "insert", "$despesa->DESC", "", $despesa->ID, $empresa->ID, $user->ID));
                return $despesa;
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function despesasByTag($id){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $despesa = Despesa::where('ID_EMPRESA', $empresa->ID)->where('ID_TAG', $id)->with([
                'Tags' => function($query){
                    $query->select('ID', 'NOME');
                }
            ])->paginate(6);
            return $despesa;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function despesaBetweenTwoDates(Request $request){
        try{
            $user = auth()->user();
            $empresa = $user->empresa;
            $startData = Carbon::parse($request->start);
            $endData = Carbon::parse($request->end);
            $despesas = null;
            if($request->filled('pdf')){
                $despesas = DB::table('DESPESAS')
                ->whereBetween('DATA', [$startData, $endData])
                ->join('TAGS', 'TAGS.ID', '=', 'DESPESAS.ID_TAG')->select('DESPESAS.ID','DESPESAS.CUSTO','TAGS.NOME_REAL', 'DESPESAS.DATA')->get();
            }else{
                $despesas = Despesa::whereBetween('DATA', [$startData, $endData])->where('ID_EMPRESA', $empresa->ID)
                ->with(['Tags' => function($query){
                    $query->select('ID', 'NOME');
                }])->paginate(6);
            }
            foreach ($despesas as $despesa ) {
                $despesa->DATA = Carbon::parse($despesa->DATA)->format('d / m / Y :  H:i');
            }
            return $despesas;

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function show($id)
    {
        try{
            $user = auth()->user();
            return Despesa::where('ID', $id)->with(['Tags' => function($query){
                $query->select('ID', 'NOME');
            }])->firstOrFail();

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function update(StoreDespesaValidator $request, $id)
    {
        try{
            $valitador = $request->validated();
            if($valitador){
                $user = auth()->user();
                $empresa = $user->empresa;
                $despesa = Despesa::FindOrFail($id);
                $tmp = $despesa;
                $despesa->DESC = $request->DESC;
                $despesa->ID_EMPRESA = $empresa->ID;
                $despesa->CUSTO = $request->CUSTO;
                $despesa->DATA = Carbon::parse($request->DATA);
                $despesa->ID_TAG = $request->ID_TAG;

                event(new MakeLog("Despesas", "", "update",
                json_encode($despesa), json_encode($tmp), $despesa->ID, $empresa->ID, $user->ID));

                $despesa->save();
                return $despesa;
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function destroy($id)
    {
        try{
            $despesa = Despesa::FindOrFail($id);
            $despesa->delete();
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }

}
