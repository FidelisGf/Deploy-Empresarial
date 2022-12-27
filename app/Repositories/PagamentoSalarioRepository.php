<?php

namespace App\Repositories;

use App\Pagamento_Salario;

class PagamentoSalarioRepository
{
    public function __construct()
    {
        //
    }
    public function index(){
        try{
            $empresa = auth()->user()->empresa;

            $pagamentos = Pagamento_Salario::where('ID_EMPRESA', '=', $empresa->ID)
            ->paginate(20);

            return response()->json($pagamentos);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function destroy($id){
        try{

            $pagamento = Pagamento_Salario::FindOrFail($id);
            $pagamento->delete();

            return response()->json(['message' => 'Pagamento deletado com sucesso !']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
}
