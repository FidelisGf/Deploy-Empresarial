<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientValidator;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClienteRepository $clienteRepository)
    {
        return $clienteRepository->index();
    }

    public function create()
    {

    }
    public function store(StoreClientValidator $request, ClienteRepository $clienteRepository)
    {
        return $clienteRepository->store($request);
    }

    public function show($id, ClienteRepository $clienteRepository)
    {
        return $clienteRepository->show($id);
    }

    public function edit($id)
    {
        //
    }

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
