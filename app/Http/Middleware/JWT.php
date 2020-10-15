<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Exception;
use Illuminate\Http\Request;

class JWT extends BaseMiddleware
{

    public function checkForToken(Request $request)
    {
        if (! $this->auth->parser()->setRequest($request)->hasToken()) {
            return ['success'=> false, 'message' => 'Token not provided'];
        }
        return ['success' => true];
    }
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
            if ( ! $token = $this->checkForToken($request) ){
                throw new Exception($token->message);
            }
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                // return response()->json(['status' => 'Token is Invalid']);
                throw new Exception( 'Token is Invalid' );
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['status' => 'Token is Expired']);
                throw new Exception( 'token_expired' );
            }else{
                throw new Exception( 'Unauthorized' );
                // return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
