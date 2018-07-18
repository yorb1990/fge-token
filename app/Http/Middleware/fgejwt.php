<?php

namespace App\Http\Middleware;

use Closure;

class fgejwt
{
    public function handle($request, Closure $next)
    {
        $TNP='token-jwt';
        $token="";
        if($request->route($TNP)==NULL){
            if($request->input($TNP)==NULL){
                if($request->header($TNP)==null){
                    if(
                          $request->is('fge_tok/login')
                        ||$request->is('fge_tok/regmod1')
                        ){
                        return $next($request);
                    }
                    return redirect('fge_tok/login');
                }else{
                    $token=$request->header($TNP);
                }                
            }else{
                $token=$request->input($TNP);
            }
        }else{
            $token=$request->route($TNP);
        }
        $error="";
        $dtoken=new \fge\jwt\src\jwt(env("CLAVE"));
        if($dtoken->decryptp1($token)){
            if($dtoken->decryptp1_5($token)){
                    if($dtoken->decryptp2()){
                        if($dtoken->decryptp3()){
                            if($dtoken->decryptp4($error)){
                                    /*exito levantar cokie local
                                    $dtoken->GetJSON()
                                    */
                                    return $next($request);
                            }else{
                                return Response::json(array('message'=>$error));  
                            }
                        }else{
                            return Response::json(array('message'=>'formato invalido (token json interno)'));  
                        }
                    }else{
                        return Response::json(array('message'=>'decifrado AES incorrecto'));  
                    }
            }else{
                return Response::json(array('message'=>'error numero de token no valido'));  
            }
        }else{
            return Response::json(array('message'=>'error de formato'));  
        }
    }
}
