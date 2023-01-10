<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthValidator;
use App\Http\Requests\RegisterEmployeeValidator;
use App\Http\Requests\StoreEmpresaValidator;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsuarioRepository $usuarioRepository)
    {
        return $usuarioRepository->index();
    }
    public function destroy($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->destroy($id);
    }
    public function show($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->show($id);
    }
    public function updateUser(Request $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->updateUser($request);
    }
    public function create()
    {
        //
    }
    public function checkIfWageWasPayed(Request $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->checkIfWageWasPayed($request);
    }
    public function getCompleteHistoryPenalidades($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getCompleteHistoryPenalidades($id);
    }
    public function makeWagePayment(Request $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->makeWagePayment($request);
    }
    public function getUserTotalVendasByMes($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getUserTotalVendasByMes($id);
    }
    public function getHistoricoSalarioUser($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getHistoricoSalarioUser($id);
    }
    public function getFolhaSalarioUsers(Request $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getFolhaSalarioUsers($request);
    }
    public function vinculaUsuarioEmpresa(StoreEmpresaValidator $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->vinculaUsuarioEmpresa($request);
    }
    public function checkIfUserHasEmpresa(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->checkIfUserHasEmpresa();
    }
    public function getEmpresaByUser(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getEmpresaByUser();
    }
    public function profile(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->profile();
    }
    public function showAvalibleRoles(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->showRolesAvaibles();
    }
    public function getActiveUsers(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getActiveUsers();
    }
    public function getPenalidades($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getPenalidades($id);
    }
    public function getVendasByUser($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getVendasByUser($id);
    }
    public function getUserMediaVendasByAno($id, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getUserMediaVendasByAno($id);
    }
    public function getPerfilUserInternet(UsuarioRepository $usuarioRepository){
        return $usuarioRepository->getPerfilUserInternet();
    }
    public function checkIfPassword(Request $request, UsuarioRepository $usuarioRepository){
        return $usuarioRepository->checkIfPassword($request);
    }
}
