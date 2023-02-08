<?php
namespace App\Http\interfaces;

use App\Http\Requests\StorePenalidadeValidator;
use App\Penalidade;
use Illuminate\Http\Request;

interface PenalidadeInterface{
    public function store(StorePenalidadeValidator $request);
    public function getDescontoMensalByUser($id);
    public function destroy($id);
    public function historyFactory(Penalidade $p);

}
