<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class Google2FAMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || !$user->hasGoogle2faEnabled()) {
            return $next($request); // Lewatkan jika Google2FA tidak diaktifkan
        }

        // Cek apakah sesi 2FA sudah selesai
        if (!$request->session()->get('google2fa_passed', false)) {
            return redirect()->route('google2fa.verify');
        }

        return $next($request);
    }
}
