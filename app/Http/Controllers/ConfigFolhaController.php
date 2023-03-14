<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigFolhaRepository;
use Illuminate\Http\Request;

class ConfigFolhaController extends Controller
{
    public function setAjustes(Request $request, ConfigFolhaRepository $configFolhaRepository){
        return $configFolhaRepository->setAjustes($request);
    }
    public function showAjuste(ConfigFolhaRepository $configFolhaRepository){
        return $configFolhaRepository->showAjuste();
    }
}
