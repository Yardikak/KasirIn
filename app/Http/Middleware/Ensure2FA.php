<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ensure2FA
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->google2fa_secret && !$request->is('google2fa/verify')) {
            return redirect()->route('google2fa.setup');
        }

        return $next($request);
    }
}
