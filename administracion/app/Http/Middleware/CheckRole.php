<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Verifica si el usuario NO está logueado O si su rol NO está en la lista permitida
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            // Si no pasa, aborta con error 403 (Prohibido)
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}