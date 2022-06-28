<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao_padrao, $perfil)
    {
        echo $metodo_autenticacao_padrao. ', '. $perfil . '<br>';
        return Response('Acesso negado! Rota exige autenticação');

        //POSSO REALIZAR AUTENTICAÇÕES AQUI DENTRO
    }
}
