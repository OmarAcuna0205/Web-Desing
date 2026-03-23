<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    public function handle(Request $request, Closure $next, string ...$rolesPermitidos): Response
    {
        // 1. ¿Está autenticado? (Si no hay sesión, pa' fuera)
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión.');
        }

        // 2. ¿Tiene alguno de los roles requeridos?
        $rolUsuario = auth()->user()->rol;

        if (!in_array($rolUsuario, $rolesPermitidos)) {
            return redirect()->route('dashboard')
                ->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        // 3. Todo correcto, pásale
        return $next($request);
    }
}