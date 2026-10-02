<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check() || ! auth()->user()->es_admin) {
            abort(403);
        }

        // dd([
        //     'autenticado' => auth()->check(),
        //     'usuario' => auth()->user(),
        //     'es_admin' => auth()->user()?->es_admin,
        // ]);

        return $next($request);
    }
}
