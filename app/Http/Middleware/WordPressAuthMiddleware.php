<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WordPressAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica todos os cookies da requisição para encontrar o cookie do WordPress
        $cookies = $request->cookies->all();

        //dd($cookies);  // dd() exibe os cookies e para a execução do código

        // Procura por um cookie que começa com 'wordpress_logged_in_'
        $wpCookie = false;
        foreach ($cookies as $key => $value) {
            if (strpos($key, 'wordpress_logged_in_') === 0) {
                $wpCookie = true;
                break;
            }
        }

        // Se o cookie não for encontrado, bloqueia o acesso
        if ($wpCookie == false) {
            return response()->make("<h1 style='margin:190px auto;text-align:center'>Por favor, faça login no seu site para acessar</h1>", 403);
        }

        // Caso o cookie exista, libera o acesso
        return $next($request);
    }
}
