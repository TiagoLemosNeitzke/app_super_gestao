<?php
// O MIDDLEWARE DEVE SER ASSOCIADO A UMA ROTA, PARA PODER SER UTILIZADO
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
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
        //return $next($request);
        //FORMANDO UMA RESPOSTA PARA A REQUISIÇÃO, É APENAS UM EXEMPLO
        return response('<div style="color: red;">Ouve um erro ao tentar acessar esta página, tente novamente.</div>');
    }
}
