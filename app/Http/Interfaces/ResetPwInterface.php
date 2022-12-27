<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreResetPwValidator;
use Illuminate\Http\Request;

interface ResetPwInterface{
    public function sendResetPwEmail(StoreResetPwValidator $request);
    public function resetPassword(StoreResetPwValidator $request);
}
