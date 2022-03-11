<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $request->bearer,
        ])->get(config('microservices.avaliable.micro_01.url').'/api/autenticar');

        $retorno = json_decode($response->body());            
        if ($retorno->message == 'autenticado') {
            $request['user_key'] = $retorno->user_key;
            return $next($request);
        }
        return response()->json(['error' => 'Não foi possível autenticar'], 404);
    }
}
