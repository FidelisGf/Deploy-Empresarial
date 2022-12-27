<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthValidator;
use App\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register',
        'refresh', 'profile', 'logout', 'getAuthenticatedUser']]);
    }
    public function register(RegisterAuthValidator $request){
        try{
            $validator = $request->validated();
            if($validator){
                $user = auth()->user();
                $user = Usuario::create(array_merge(
                    $request->all(),
                    ['PASSWORD' => bcrypt($request->PASSWORD)]// 'criptografa' a senha antes de inserir no banco
                ));
                if(auth()->user()){
                    if(auth()->user()->role->LEVEL == 10){
                        $image = base64_encode(file_get_contents($request->file('IMAGE')->path()));
                        $user->IMAGE = $image;
                        $user->EMPRESA_ID = auth()->user()->empresa->ID;
                        $user->SALARIO = $request->SALARIO;
                        $user->save();
                    }
                }
                return response()->json(["message" =>
                'Usuario registrado com sucesso !',"Usuario" => $user], 201);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try{

            $Usuario = Usuario::where('NAME', $request->NAME)
            ->first();

            if($Usuario){
                if(Hash::check($request->PASSWORD, $Usuario->PASSWORD )){
                    if ($token = auth()->guard('api')->login($Usuario)) {
                        return $this->respondWithToken($token);
                    }
                }else{
                    return response()->json(['message' => 'Senha Não confere !'],400);
                }
            }else{
                return response()->json(['message' => 'Usuario Não encontrado !'],404);
             }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()],404);
        }
    }
    public function getAuthenticatedUser()
            {
                try {
                    if (! $user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json('user_not_found', 401);
                    }else{
                        return response()->json(['message' => 'sucess'],200);
                    }
                }catch (TokenInvalidException $e) {
                    return response()->json('token_invalid', 401);
                }
                catch (TokenExpiredException $e) {

                    $token = auth()->guard('api')
                    ->refresh();

                    return response()->json($token, 401);
                }
        }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->guard('api')->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()
            ->guard('api')
            ->factory()
            ->getTTL() * 120
        ]);
    }


}
