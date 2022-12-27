<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreMedidaValidator;
use Illuminate\Http\Request;

interface MedidasInterface{
    public function index();
    public function store(StoreMedidaValidator $request);
}
