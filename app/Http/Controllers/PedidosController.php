<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\StorePedidoValidator;
use App\Mail\SendMailUser;
use App\Repositories\PedidosRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PedidosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PedidosRepository $pedidosRepository)
    {
        return $pedidosRepository->index($request);
    }

    public function create()
    {
        //
    }


    public function store(StorePedidoValidator $request, PedidosRepository $pedidosRepository)
    {

        return $pedidosRepository->store($request);

    }


    public function checkQuantidadeProduto(Request $request, PedidosRepository $pedidosRepository){
        return $pedidosRepository->checkQuantidadeProduto($request);
    }

    public function aprovarPedido($id, PedidosRepository $pedidosRepository){
        return $pedidosRepository->aprovarPedido($id);
    }
    public function update(StorePedidoValidator $request, $id, PedidosRepository $pedidosRepository)
    {
        return $pedidosRepository->update($request, $id);
    }

    public function show($id, PedidosRepository $pedidosRepository)
    {
        return $pedidosRepository->show($id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, PedidosRepository $pedidosRepository)
    {
        $user = auth()->user();
        if($user->role->LEVEL == 10){
            return $pedidosRepository->destroy($id);
        }else{
            return response()->json(["message" => "Usuario nao autorizado !"],400);
        }
    }

    public function storeInternetPedidos(Request $request, PedidosRepository $pedidosRepository){
        return $pedidosRepository->storeInternetPedidos($request);
    }
    public function getProdutosFromPedidos($id, PedidosRepository $pedidosRepository){
        return $pedidosRepository->getProdutosFromPedidos($id);
    }
}
