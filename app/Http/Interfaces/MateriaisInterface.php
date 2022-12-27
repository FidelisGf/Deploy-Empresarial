<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreMateriaisValidator;
use App\Http\Requests\StoreQuantidadeMateriaisValidator;
use Illuminate\Http\Request;

interface MateriaisInterface{
    public function index();
    public function adicionaQuantidadeMaterial(StoreQuantidadeMateriaisValidator $request, $id);
    public function removeQuantidadeMaterial($materiais, $quantidade);
    public function store(StoreMateriaisValidator $request);
    public function show($id);
}
