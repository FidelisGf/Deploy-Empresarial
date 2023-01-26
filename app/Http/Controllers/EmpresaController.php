<?php

namespace App\Http\Controllers;


use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function index(EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->index();
    }

    public function getEmpresaFromUser(EmpresaRepository $empresaRepository, Request $request){
        return $empresaRepository->getEmpresaFromUser($request);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->store($request);
    }

    public function show($id, EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->show($id);
    }

    public function edit($id, EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->edit($id);
    }

    public function update(Request $request, $id, EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->update($request, $id);

    }

    public function destroy($id, EmpresaRepository $empresaRepository)
    {
        return $empresaRepository->destroy($id);
    }


    public function setConfigSite(Request $request, EmpresaRepository $empresaRepository){
        return $empresaRepository->setConfigSite($request);
    }



}
