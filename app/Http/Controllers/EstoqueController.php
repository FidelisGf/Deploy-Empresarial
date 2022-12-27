<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstoqueValidator;
use App\Repositories\EstoqueRepository;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, EstoqueRepository $estoqueRepository)
    {
        return $estoqueRepository->index($request);
    }

    public function create()
    {

    }

    public function storeProdutoInEstoque($product_id, $quantidade, EstoqueRepository $estoqueRepository)
    {
        return $estoqueRepository->storeProdutoInEstoque($product_id, $quantidade);
    }

    public function addEstoque(StoreEstoqueValidator $request, EstoqueRepository $estoqueRepository){
        return $estoqueRepository->addEstoque($request);
    }
    public function removeEstoque($product_id, $quantidade, EstoqueRepository $estoqueRepository){
        return $estoqueRepository->removeEstoque($product_id, $quantidade);
    }

    public function getQuantidadeProduct($id, EstoqueRepository $estoqueRepository){
        return $estoqueRepository->getQuantidadeProduct($id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
