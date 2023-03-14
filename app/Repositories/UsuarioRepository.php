<?php

namespace App\Repositories;

use App\Empresa;
use App\Historico_Penalidade;
use App\Http\Requests\RegisterEmployeeValidator;
use App\Http\Requests\StoreEmpresaValidator;
use App\Pagamento_Salario;
use App\Pedidos;
use App\Penalidade;
use App\Role;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioRepository
{
    public function __construct()
    {

    }
    public function index(){
        try{
            $empresa = auth()->user()->empresa->ID;

            $usuarios = Usuario::where('EMPRESA_ID', $empresa)
            ->with([
                'role' => function($query){
                    $query->select('ID', 'NOME');
                }
            ])->where('ID_ROLE', '!=', 1)
            ->where('ID_ROLE', '!=', 4)
            ->paginate(15);

            return $usuarios;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function vinculaUsuarioEmpresa(StoreEmpresaValidator $request){
        try{
            $validator = $request->validated();
            if($validator){
                $Empresa = Empresa::create($request->all());
                if($Empresa){

                    $auth = JWTAuth::parseToken()
                    ->authenticate();

                    $USER = $auth;
                    $USER->EMPRESA_ID = $Empresa->ID;
                    if($USER->save()){
                        return response()->json(['message' => 'Usuario e Empresa vinculados com sucesso !']);
                    }else{
                        return response()->json(['message' => 'Falhar ao vincular usuario !'],400);
                    }
                }
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function showRolesAvaibles(){
        try{
            $roles = Role::all();
            return $roles;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }

    public function checkIfUserHasEmpresa(){
        try{
            $user = auth()->user();
            if($user->EMPRESA_ID != null ){
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function getEmpresaByUser(){
        try{
            $user = auth()->user();
            return response()->json([$user->empresa]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function profile(){
        try{
            $user = auth()->user();
            return response()->json(['level' => $user->role->LEVEL, 'cargo' => $user->role->NOME, 'id' => $user->ID]) ;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }

    public function getPerfilUserInternet(){
            try{
                $user = auth()->user();
                $user->IMAGE = "data:image/png;base64,$user->IMAGE";

                $pRealizados = Pedidos::where('ID_USER', $user->ID)
                ->count();

                $pPagos = Pedidos::where('ID_USER', $user->ID)
                ->where('DT_PAGAMENTO', '!=', null)
                ->count();

                $user->pPagos = $pPagos;
                $user->pRealizados = $pRealizados;
                return $user;
            }catch(\Exception $e){
                return response()->json(['message' => $e->getMessage()]);
            }
    }
    public function getActiveUsers(){
        try{
            $empresa = auth()->user()->empresa->ID;

            $actives = Usuario::where('EMPRESA_ID', $empresa)
            ->count();

            return $actives;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function destroy($id){
        try{
            $usuario = Usuario::FindOrFail($id);
            $usuario->delete();
            return response(['message'=> 'Usuario excluido com sucesso !'],200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getPenalidades($id){
        try{
            $monthStart = date('01-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('31-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $user = Usuario::FindOrFail($id);

            return $user->penalidades
            ->whereBetween('DATA', [$monthStart, $monthFinal]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function getCompleteHistoryPenalidades($id){
        try{
            $valor = 0;

            $user = Usuario::FindOrFail($id);
            $penaliades = $user->penalidades()
            ->withTrashed()->get();
            foreach($penaliades as $p){

                $historico = Historico_Penalidade::where('ID_PENALIDADE', $p->ID)
                ->first();

                $p->ORIGINAL = $historico->VALOR_ORIGINAL;
                $valor += $p->ORIGINAL;
            }
            $quantidade = $user->penalidades()
            ->withTrashed()
            ->count();


            $valorDevido = floatval( $user->penalidades
            ->sum('DESCONTO'));

            return response()->json(['penalidades' => $penaliades,
            'quantidade' => $quantidade, 'valorTotal' => $valor,
            'valorDevido' => $valorDevido]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function updateUser(RegisterEmployeeValidator $request){

        try{

            $user = Usuario::FindOrFail($request->ID);
            if($request->has('IMAGE')){

                $image = base64_encode(file_get_contents($request->file('IMAGE')->path()));
                $user->IMAGE = $image;
            }
            $user->NAME = $request->NAME;
            $user->CPF = $request->CPF;
            $user->EMAIL = $request->EMAIL;
            $user->SALARIO = $request->SALARIO;
            if(!$request->filled('Shop')){
                    $user->ID_ROLE = $request->ID_ROLE;
            }
            $user->save();
            return response()->json(['message' => 'Usuario Editado com sucesso !']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function checkIfPassword(Request $request){
        try{
            $Usuario = Usuario::where('ID', $request->ID)
            ->first();

            if($Usuario){
                if(Hash::check($request->PASSWORD, $Usuario->PASSWORD )){
                    return response()->json(true);
                }else{
                    return response()->json(false);
                }
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }

    }

    public function show($id){
        try{
            $monthStart = date('01-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('31-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $valorTotalVendas = 0;
            $usuario = Usuario::FindOrFail($id);


            $cargo = $usuario->role;

            $qntdVendas = $usuario->pedidos
            ->count();

            $valorTotalVendas = floatval( $usuario->pedidos
            ->where('DT_PAGAMENTO', '!=', null)
            ->sum('VALOR_TOTAL'));

            $qntdPenalidades = Penalidade::where('ID_USER', '=',  $id)
            ->whereBetween('DATA', [$monthStart, $monthFinal])
            ->count();
            $usuario = $usuario->only('ID', 'NAME', 'EMAIL', 'CPF',
            'CREATED_AT', 'UPDATED_AT', 'SALARIO', 'ID_ROLE', 'IMAGE');



            return response()->json(['usuario' => $usuario, 'qntdVendas' => $qntdVendas, 'qntdPenalidades'
            =>$qntdPenalidades, 'totalVendido' => $valorTotalVendas, 'cargo' => $cargo],200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getVendasByUser($id){
        try{
            $user = Usuario::FindOrFail($id);
            return $user->pedidos;
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getUserMediaVendasByAno($id){
        try{
            $yearStart = date('01-01-Y');
            $yearStart = Carbon::parse($yearStart);
            $yearFinal = date('31-12-Y');
            $yearFinal = Carbon::parse($yearFinal);
            $mediaVendas = floatval(DB::table('PEDIDOS')
            ->whereBetween('PEDIDOS.DT_PAGAMENTO', [$yearStart, $yearFinal])
            ->where('PEDIDOS.ID_USER', $id)
            ->avg('PEDIDOS.VALOR_TOTAL'));
            return response()->json([$mediaVendas]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getUserTotalVendasByMes($id){
        try{
            $monthStart = date('01-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('30-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $totalVendasMes = floatval(DB::table('PEDIDOS')
            ->whereBetween('PEDIDOS.DT_PAGAMENTO', [$monthStart, $monthFinal])
            ->where('PEDIDOS.ID_USER', $id)
            ->sum('PEDIDOS.VALOR_TOTAL'));
            return response()->json([$totalVendasMes]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getHistoricoSalarioUser($id){
        try{
            $salarios = DB::table('SALARIOS_CHANGES')
            ->where('ID_USER', $id)
            ->select('SALARIOS_CHANGES.SALARIO')
            ->orderBy('SALARIOS_CHANGES.CREATED_AT', 'ASC')
            ->get();
            $salariosArray = [];
            foreach($salarios as $s){
                $salariosArray[] = floatval($s->SALARIO);
            }
            return response()->json([$salariosArray]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function getFolhaSalarioUsers(Request $request){
        try{
            $monthStart = date('16-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('31-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $empresa = auth()->user()->empresa;
            $vlTotal = 0;
            $salarios = DB::table('USERS')
            ->leftJoin('PEDIDOS', function($join){
                $join->on('PEDIDOS.ID_USER', '=', 'USERS.ID')
                ->where('PEDIDOS.PG_COMISSAO', '=', null);
             })
            ->selectRaw('
                USERS.ID as id,
                USERS.NAME as NOME,
                USERS.CPF as CPF,
                sum(HISTORICO_PENALIDADES.VALOR_ATUAL) as DespesaTotal,
                USERS.SALARIO as SALARIO_BASE,
                USERS.SALARIO as Final,
                sum(HISTORICO_PENALIDADES.VALOR_ORIGINAL) as Comparativo,
                sum(PEDIDOS.COMISSAO) as COMISSAO_TOTAL,
                USERS.EMPRESA_ID
            ')
            ->leftJoin('PENALIDADES', 'USERS.ID', '=', 'PENALIDADES.ID_USER')
            ->leftJoin('HISTORICO_PENALIDADES', function($join){
                $join->on('PENALIDADES.ID', '=', 'HISTORICO_PENALIDADES.ID_PENALIDADE')
                ->where('HISTORICO_PENALIDADES.VALOR_ATUAL', '>', '0');
             })
            ->where('USERS.EMPRESA_ID', $empresa->ID)
            ->where('USERS.ID_ROLE', '!=', 1)
            ->where('USERS.ID_ROLE', '!=', 4)
            ->groupByRaw('1, 2, 3, 5, 9')
            ->get();
            foreach($salarios as $s){
                if($s->DESPESATOTAL == null){
                    $s->DESPESATOTAL = 0;
                }
                if($request->FLAG == true){
                    $s->FINAL -= $s->DESPESATOTAL;
                    $s->FINAL += $s->COMISSAO_TOTAL;
                    $vlTotal += $s->FINAL;
                }else if($request->FLAG == false){
                        if($request->FILTRO == "Salario"){
                            $s->FINAL = ($s->FINAL * 60) / 100;
                            if($s->COMPARATIVO == $s->DESPESATOTAL){
                                $s->DESPESATOTAL = ($s->DESPESATOTAL * 60) / 100;
                            }
                        }else{
                            $s->FINAL = ($s->FINAL * 40) / 100;
                            if($s->COMPARATIVO == $s->DESPESATOTAL){
                                $s->DESPESATOTAL = ($s->DESPESATOTAL * 40) / 100;
                            }
                        }
                        $s->FINAL -= $s->DESPESATOTAL;
                        $s->FINAL += $s->COMISSAO_TOTAL;
                        $vlTotal += $s->FINAL;
                }
                $s->FINAL = number_format($s->FINAL, 2, ',', '.');
                $s->DESPESATOTAL = number_format($s->DESPESATOTAL, 2, ',', '.');
            }
            return response()->json(['data' => $salarios, 'vlTotal' => $vlTotal]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    public function makeWagePayment(Request $request){
        try{
            $monthStart = date('16-M-Y');
            $monthStart = Carbon::parse($monthStart);
            $monthFinal = date('31-M-Y');
            $monthFinal = Carbon::parse($monthFinal);
            $empresa = auth()->user()->empresa;
            $salarios = DB::table('USERS')
            ->leftJoin('PEDIDOS', function($join){
                $join->on('PEDIDOS.ID_USER', '=', 'USERS.ID')
                ->where('PEDIDOS.PG_COMISSAO', '=', null);
             })
            ->selectRaw('
                USERS.ID as id,
                USERS.NAME as NOME,
                USERS.CPF as CPF,
                sum(HISTORICO_PENALIDADES.VALOR_ATUAL) as DespesaTotal,
                USERS.SALARIO as SALARIO_BASE,
                USERS.SALARIO as Final,
                sum(HISTORICO_PENALIDADES.VALOR_ORIGINAL) as Comparativo,
                sum(PEDIDOS.COMISSAO) as COMISSAO_TOTAL,
                USERS.EMPRESA_ID
            ')
            ->leftJoin('PENALIDADES', 'USERS.ID', '=', 'PENALIDADES.ID_USER')
            ->leftJoin('HISTORICO_PENALIDADES', function($join){
                $join->on('PENALIDADES.ID', '=', 'HISTORICO_PENALIDADES.ID_PENALIDADE')
                ->where('HISTORICO_PENALIDADES.VALOR_ATUAL', '>', '0');
             })
            ->where('USERS.EMPRESA_ID', $empresa->ID)
            ->where('USERS.ID_ROLE', '!=', 1)
            ->groupByRaw('1, 2, 3, 5, 9')
            ->get();
            $totalPago = 0;
            foreach($salarios as $s){
                if($s->DESPESATOTAL == null){
                    $s->DESPESATOTAL = 0;
                }
                if($request->FLAG == true){
                    $s->FINAL -= $s->DESPESATOTAL;
                    $s->FINAL += $s->COMISSAO_TOTAL;
                    $totalPago += $s->FINAL;
                }else{
                    if($request->TIPO == "Salario"){
                        if($s->COMPARATIVO == $s->DESPESATOTAL){
                            $s->DESPESATOTAL = ($s->DESPESATOTAL * 60) / 100;
                        }
                        $s->FINAL = ($s->FINAL * 60) / 100;
                    }else{
                        if($s->COMPARATIVO == $s->DESPESATOTAL){
                            $s->DESPESATOTAL = ($s->DESPESATOTAL * 40) / 100;
                        }
                        $s->FINAL = ($s->FINAL * 40) / 100;
                    }
                    $s->FINAL -= $s->DESPESATOTAL;
                    $s->FINAL += $s->COMISSAO_TOTAL;
                    $totalPago += $s->FINAL;
                }
                $penalidades = Penalidade::where('ID_USER', $s->ID)->get();
                    if(!empty($penalidades)){
                        foreach($penalidades as $p){

                            $historico = Historico_Penalidade::where('ID_PENALIDADE', $p->ID)
                            ->first();

                            if($historico->VALOR_ATUAL <= 0){
                                $p->delete();
                            }else{
                                if($request->TIPO == "Adiantamento"){
                                    $p->DESCONTO -= ($historico->VALOR_ORIGINAL * 40) / 100;
                                    $p->save();
                                }else{
                                    if($request->FLAG == true){
                                        // true significa que não é pagamento adiantamento,
                                        //então é descontado inteiro
                                        $p->DESCONTO -=
                                        $historico->VALOR_ORIGINAL;
                                    }else{
                                        $p->DESCONTO -=
                                        ($historico->VALOR_ORIGINAL * 60) / 100;
                                    }
                                    $p->save();
                                }
                                $historico->VALOR_ATUAL = $p->DESCONTO;
                                $historico->DT_PAGAMENTO = now();
                                $historico->save();
                        }
                    }
                }
            }
            DB::table('PEDIDOS')
            ->whereBetween('PEDIDOS.DT_PAGAMENTO', [$monthStart, $monthFinal])
            ->where('PEDIDOS.PG_COMISSAO', '=', null)
            ->update(["PEDIDOS.PG_COMISSAO" => now()->format('Y-m-d H:i')]);


            $pagamentoSalario = new Pagamento_Salario();
            $pagamentoSalario->VALOR_PAGO = $totalPago;
            $pagamentoSalario->TIPO = $request->TIPO;
            $pagamentoSalario->ID_EMPRESA = $empresa->ID;
            $pagamentoSalario->DATA = now()->format('Y-m-d H:i');
            $pagamentoSalario->save();

            return response()->json(['message' => 'Pagamento Registrado
            com sucesso !',
            'data' => $salarios, 'totalPago' => $totalPago]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }

    }
    public function checkIfWageWasPayed(Request $request){
        try{
            $flag = false;
            $empresa = auth()->user()->empresa;
            $dtAtual = now()->format("m");

            $salariosPagos = Pagamento_Salario::where('ID_EMPRESA', $empresa->ID)
            ->where('TIPO', $request->TIPO)
            ->selectRaw('extract (MONTH from PAGAMENTOS_SALARIOS.DATA)
            as mes_pagamento')
            ->get();

            foreach($salariosPagos as $s){
               if($s->MES_PAGAMENTO == $dtAtual){
                    $flag = true;
               }
            }
            return response()->json($flag);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }

}
