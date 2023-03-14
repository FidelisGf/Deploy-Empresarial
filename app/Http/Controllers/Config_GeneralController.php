<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigGeneralRepository;
use Illuminate\Http\Request;

class Config_GeneralController extends Controller
{
    public function setConfig(Request $request, ConfigGeneralRepository $configGeneralRepository){
        return $configGeneralRepository->setConfig($request);
    }
    public function getConfig(Request $request, ConfigGeneralRepository $configGeneralRepository){
        return $configGeneralRepository->getConfig($request);
    }

}
