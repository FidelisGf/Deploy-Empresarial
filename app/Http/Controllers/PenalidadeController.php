<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenalidadeValidator;
use App\Repositories\PenalidadeRepository;
use Illuminate\Http\Request;

class PenalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenalidadeValidator $request, PenalidadeRepository $penalidadeRepository)
    {
        return $penalidadeRepository->store($request);
    }
    public function getDescontoMensalByUser($id, PenalidadeRepository $penalidadeRepository){
        return $penalidadeRepository->getDescontoMensalByUser($id);
    }
    public function destroy($id, PenalidadeRepository $penalidadeRepository)
    {
        return $penalidadeRepository->destroy($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

}
