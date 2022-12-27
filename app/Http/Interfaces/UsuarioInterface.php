<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreEmpresaValidator;
use Illuminate\Http\Request;

interface UsuarioInterface{
    public function index();
    public function destroy($id);
    public function show($id);
    public function vinculaUsuarioEmpresa(StoreEmpresaValidator $request);
    public function checkIfUserHasEmpresa();
    public function getEmpresaByUser();
    public function profile();
    public function getActiveUsers();
    public function getPenalidades($id);
    public function getVendasByUser($id);
    public function getUserMediaVendasByAno($id);
    public function getUserTotalVendasByMes($id);
    public function getHistoricoSalarioUser($id);
    public function getFolhaSalarioUsers(Request $request);
    public function makeWagePayment(Request $request);
    public function checkIfWageWasPayed(Request $request);

}
