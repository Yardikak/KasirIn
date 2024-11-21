<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan akun aktif
        if (Auth::check() && !Auth::user()->is_active) {
            return redirect()->route('activation.notice')
                ->with('message', 'Silakan aktifkan akun Anda terlebih dahulu.');
        }

        return $next($request); // Izinkan akses jika akun aktif
    }
}

