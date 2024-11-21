<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Generate OTP
        $otp = random_int(100000, 999999);

        // Simpan pengguna dengan OTP
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => false, // Set default tidak aktif
            'activation_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Kirim email OTP
        Mail::raw("Kode OTP Anda adalah: $otp. Berlaku selama 10 menit.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Activation OTP');
        });

        // Trigger event jika diperlukan
        event(new Registered($user));

        return redirect()->route('activation.notice')
                         ->with('message', 'Registrasi berhasil. Silakan cek email Anda untuk kode OTP.');
    }
}

