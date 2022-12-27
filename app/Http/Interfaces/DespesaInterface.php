<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreDespesaValidator;
use Illuminate\Http\Request;

interface DespesaInterface{
    public function index(Request $request);
    public function store(StoreDespesaValidator $request);
    public function sumDespesasMensais();
    public function despesasByTag($id);
    public function despesaBetweenTwoDates(Request $request);
    public function show($id);
    public function update(StoreDespesaValidator $request, $id);
    public function destroy($id);
}
