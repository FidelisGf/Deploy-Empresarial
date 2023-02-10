<?php
namespace App\Http\interfaces;

use Illuminate\Http\Request;

interface TemaEmpresaInterface{
    public function show();
    public function setTema(Request $request);

}
