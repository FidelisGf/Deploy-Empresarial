<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResetPwValidator;
use App\Mail\SendMailPw;
use App\Repositories\ResetPwRepository;
use App\ResetPw;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class ResetPwController extends Controller
{
    public function sendResetPwEmail(StoreResetPwValidator $request, ResetPwRepository $resetPwRepository){ // criar uma repository para
       return $resetPwRepository->sendResetPwEmail($request);
    }
    public function resetPassword(StoreResetPwValidator $request, ResetPwRepository $resetPwRepository){
       return $resetPwRepository->resetPassword($request);
    }

}
