<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckAuth
{

    public function handle(Request $request, Closure $next)
    {     
        $route =implode('/',$request->segments())."-".$request->method();          
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $request->bearer            
        ])->get(config('microservices.avaliable.micro_01.url').'/api/autenticar',[
            'route'=> $route
        ]);

        $retorno = json_decode($response->body());  
        //dd($response->body());          
        if ($retorno->message == 'autenticado') {
            $request['user_key'] = $retorno->user_key;
            return $next($request);
        }
        return response()->json(['error' => 'Não foi possível autenticar'], 404);
    }
}
