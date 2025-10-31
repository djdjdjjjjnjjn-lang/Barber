<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah pengguna sudah login DAN perannya adalah 'admin'?
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika ya, izinkan dia melanjutkan ke halaman tujuan.
            return $next($request);
        }

        // Jika tidak, tolak aksesnya dengan error 403.
        abort(403, 'THIS ACTION IS UNAUTHORIZED.');
    }
}
