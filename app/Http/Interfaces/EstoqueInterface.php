<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreEstoqueValidator;
use Illuminate\Http\Request;

interface EstoqueInterface{
    public function index(Request $request);
    public function filterByDisponivelParaVenda();
    public function filterByBiggerEstoque(Request $request);
    public function filterByLowerEstoque(Request $request);
    public function storeProdutoInEstoque($product_id, $quantidade);
    public function addEstoque(StoreEstoqueValidator $request);
    public function removeEstoque($product_id, $quantidade);
    public function getQuantidadeProduct($id);
    public function filterByProductWithMostSaidas(Request $request);

}
