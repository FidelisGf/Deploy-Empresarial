<?php

namespace App\Http\Middleware;

use Closure;


class FuncMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            $user = auth()->user();
            if($user->role->LEVEL > 2){
                return $next($request);
            }else{
                return response()->json(['message' => 'Sem autorização !'], 404);
            }
        }catch(\Exception $e){
            return response()->json(['status' => 'Sem autorização'],401);
        }
    }
}
