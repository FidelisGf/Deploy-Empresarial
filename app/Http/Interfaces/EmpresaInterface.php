<?php
namespace App\Http\interfaces;
use Illuminate\Http\Request;

interface EmpresaInterface{
    public function index();
    public function store(Request $request);
    public function getEmpresaFromUser(Request $request);
    public function show($id);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);
}
