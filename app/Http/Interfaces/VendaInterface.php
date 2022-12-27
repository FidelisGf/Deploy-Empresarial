<?php
namespace App\Http\interfaces;
use Illuminate\Http\Request;

interface VendaInterface{
    public function index(Request $request);
    public function getVendasByDate(Request $request);
    public function getLucroAndGastos(Request $request);
    public function getVendasByTipoPagamento(Request $request);
    public function getVendasPorDia();
    public function getTotalVendasInTheLastThreeMonths();
}
