<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreProdutoValidator;
use Illuminate\Http\Request;

interface ProductInterface{
    public function listAll(Request $request);
    public function filterByLowestValue(Request $request);
    public function filterByExpansiveValue(Request $request);
    public function findAllProductByCategory($id);
    public function show($id);
    public function store(StoreProdutoValidator $request);
    public function update(StoreProdutoValidator $request, $id);
    public function destroy($id);
    public function findLucroByProduto($id);
    public function search(Request $request);
    public function descontaQuantidadeMaterial($id, $quantidade);
    public function countProducts();
}
