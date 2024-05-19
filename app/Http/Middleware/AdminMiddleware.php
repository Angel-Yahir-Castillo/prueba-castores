<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role->nombre != 'administrador') {
            return redirect(route('home'))->with('error', 'No cuentas con los permisos para hacer eso.');
        }

        return $next($request);
    }
}
