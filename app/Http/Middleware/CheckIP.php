<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Lista de IPs permitidos
        $allowedIps = [
            '179.210.69.26',
            '23.105.171.73',
            '23.105.171.87',
            '199.189.26.141',
            '169.150.220.98',
            '89.187.176.94',
        ];

        if (!in_array($request->ip(), $allowedIps)) {
            // Redirecionar para a página de login se o IP não for permitido
            return redirect()->route('login');
        }

        return $next($request);
    }
}
