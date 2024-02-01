<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
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
        // Periksa apakah pengguna telah login
        if (auth()->check()) {
            // Jika pengguna telah login, lanjutkan permintaan
            return $next($request);
        }

        // Jika pengguna belum login, arahkan mereka ke halaman login atau tindakan lain
        return redirect()->route('login'); // Ganti ini dengan rute yang sesuai
    }
}