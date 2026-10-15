<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $role = auth()->user()->role;

        if (!in_array($role, ['admin', 'super_admin'], true)) {
            abort(403, 'Accès réservé à l’administration.');
        }

        return $next($request);
    }
}
