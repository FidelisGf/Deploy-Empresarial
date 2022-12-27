<?php

namespace App\Repositories;

use App\Historico_Penalidade;
use App\Http\interfaces\PenalidadeInterface;
use App\Http\Requests\StorePenalidadeValidator;
use App\Penalidade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenalidadeRepository implements PenalidadeInterface
{
    public function __construct()
    {

    }
    public function historyFactory(Penalidade $p){
        $historico = new Historico_Penalidade();
        $historico->VALOR_ORIGINAL = $p->DESCONTO;
        $historico->ID_PENALIDADE = $p->ID;
        $historico->VALOR_ATUAL = $p->DESCONTO;
        $historico->DT_PAGAMENTO = now();
        $historico->save();
    }

    public function store(StorePenalidadeValidator $request){
        try{
            $validator = $request->validated();
            if($validator){
                $penalidade = new Penalidade();
                $penalidade->DATA = Carbon::parse($request->DATA);
                $penalidade->TIPO = $request->TIPO;
                $penalidade->DESC = $request->DESC;
                $penalidade->ID_USER = $request->ID_USER;
                $penalidade->DESCONTO = $request->DESCONTO;
                $penalidade->save();
                $this->historyFactory($penalidade);
                return response()->json(['message' => 'Penalidade registrada com sucesso !']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getDescontoMensalByUser($id){
        try{
            $monthStart = date('01-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('30-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $totalDesconto  = floatval(Penalidade::where('ID_USER', $id)
            ->whereBetween('DATA', [$monthStart, $monthFinal])->sum('DESCONTO'));
            return response()->json([$totalDesconto]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function destroy($id){
        try{
            $penalidade = Penalidade::FindOrFail($id);
            $penalidade->delete();
            return response()->json(['message' => "Penalidade Excluida com sucesso !"]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
}
