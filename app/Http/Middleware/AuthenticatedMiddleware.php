<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthenticatedMiddleware
{
    /**
     * Manipula uma requisição recebida.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Obtém o email da sessão
        $email = Session::get('email');

        // Verifica se o usuário está autenticado
        if ($email) {
            // Se estiver autenticado, permite que a requisição prossiga
            return $next($request);
        } else {
            // Se não estiver autenticado, redireciona para a página de login com uma mensagem de erro
            return redirect()->route('login.index')->with('erro', 'Você precisa estar autenticado');
        }
    }
}
