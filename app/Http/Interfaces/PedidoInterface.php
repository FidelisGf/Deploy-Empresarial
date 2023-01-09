<?php
namespace App\Http\interfaces;

use App\Http\Requests\StorePedidoValidator;
use Illuminate\Http\Request;

interface PedidoInterface{
    public function index(Request $request);
    public function store(StorePedidoValidator $request);
    public function checkQuantidadeProduto(Request $request);
    public function show($id);
    public function aprovarPedido($id);
    public function update(StorePedidoValidator $request, $id);
    public function pedidosPorPeriodo(Request $request);
    public function destroy($id);
    public function pedido_factory(Request $request, $id);
    public function storeInternetPedidos(Request $request);
}
