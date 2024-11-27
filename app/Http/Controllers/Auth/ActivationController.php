<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function show()
    {
        return view('auth.activation');
    }

    public function activate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->activation_otp == $request->otp && now()->lessThanOrEqualTo($user->otp_expires_at)) {
            $user->update([
                'is_active' => true,
                'activation_otp' => null,
                'otp_expires_at' => null,
            ]);

            Auth::login($user);

            return redirect()->route('login')->with('message', 'Akun Anda telah aktif. Silakan login.');
        }

        return back()->withErrors(['otp' => 'Kode OTP tidak valid atau telah kedaluwarsa.']);
    }
}

