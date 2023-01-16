<?php

namespace App\Http\Controllers;

use App\Repositories\CupomRepository;
use Illuminate\Http\Request;

class CupomController extends Controller
{
    //

    public function getCupom(Request $request,
    CupomRepository $cupomRepository){
        return $cupomRepository->getCupom($request);
    }

    public function applyCupom(Request $request, CupomRepository $cupomRepository){
        return $cupomRepository->applyCupom($request);
    }
}
