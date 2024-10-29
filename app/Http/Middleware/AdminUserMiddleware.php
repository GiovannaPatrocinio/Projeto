<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se o nome é "Giovanna Casimira"
        if (Auth::check() && Auth::user()->name === 'Giovanna Casimira') {
            return $next($request);
        }

        // Redireciona para a página inicial ou outra página caso não seja o usuário permitido
        return redirect('/')->with('error', 'Você não tem acesso a esta área.');
    }
}
