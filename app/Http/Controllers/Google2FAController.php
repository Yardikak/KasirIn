<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class Google2FAController extends Controller
{
    public function setup(Request $request)
    {
        $google2fa = new Google2FA();

        // Menghasilkan secret key
        $secret = $google2fa->generateSecretKey();

        // Simpan secret di database untuk pengguna yang sedang login
        $user = Auth()->user();
        $user->google2fa_secret = $secret;
        $user->save();

        // Generate OTP untuk dikirim melalui email
        $otp = substr($google2fa->getCurrentOtp($secret), 0, 8); 
        Cache::put('otp_' . $user->id, $otp, now()->addMinutes(5)); 

        // Dapatkan URL QR Code untuk aplikasi authenticator
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'KasirIn',
            $user->email,
            $user->google2fa_secret
        );

        // Kirim Email
        Mail::send('emails.otp', ['otp' => $secret], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Kode OTP Anda');
        });

        return view('google2fa.setup', compact('qrCodeUrl'));
    }

    public function verify(Request $request)
    {
        $google2fa = new Google2FA();

        // Periksa OTP yang dihasilkan server
        $secret = Auth::user()->google2fa_secret;
        $generatedCode = $google2fa->getCurrentOtp($secret);

        // Validasi OTP
        $valid = $google2fa->verifyKey(Auth()->user()->google2fa_secret, $request->otp);

        if ($valid) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
        }
    }
}
