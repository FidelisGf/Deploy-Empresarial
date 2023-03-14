<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMateriaisValidator;
use App\Http\Requests\StoreQuantidadeMateriaisValidator;
use App\Repositories\MateriaisRepository;
use Illuminate\Http\Request;

class MateriaisController extends Controller
{
    public function index(MateriaisRepository $materiaisRepository)
    {
       return $materiaisRepository->index();
    }
    public function adicionaQuantidadeMaterial(StoreQuantidadeMateriaisValidator $request, $id, MateriaisRepository $materiaisRepository){
        return $materiaisRepository->adicionaQuantidadeMaterial($request, $id);
    }
    public function removeQuantidadeMaterial($materiais, $quantidade, MateriaisRepository $materiaisRepository){
        return $materiaisRepository->removeQuantidadeMaterial($materiais, $quantidade);
    }

    public function create()
    {
        //
    }

    public function store(StoreMateriaisValidator $request, MateriaisRepository $materiaisRepository)
    {
        return $materiaisRepository->store($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, MateriaisRepository $materiaisRepository)
    {
        return $materiaisRepository->show($id);
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
