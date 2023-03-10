<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
            try {
                JWTAuth::parseToken()->authenticate();
                // $token = auth('api')->refresh();
                // return response()->json(['token' => $token]);

            } catch (\Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json(['status' => 'Token is Invalid']);
                }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                    $token = auth()->guard('api')->refresh();
                    return response()->json($token, 401);
                }else{
                    return response()->json(['status' => 'Authorization Token not found']);
                }
            }
            return $next($request);
    }
}
