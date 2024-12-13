<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;

class Google2FAController extends Controller
{
    public function enableGoogle2fa()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
        }
        
        $google2fa = new Google2FA();

        // Generate Secret Key
        if (!$user->hasGoogle2faEnabled()) {
            $secretKey = $user->generateGoogle2faSecret();

            // Generate QR Code URL
            $qrCodeUrl = $google2fa->getQRCodeUrl(
                config('app.name'),
                $user->email,
                $secretKey
            );
            // dd($qrCodeUrl);

            return view('google2fa.enable', compact('qrCodeUrl', 'secretKey'));
        }
        return redirect()->back()->with('status', 'Google2FA sudah diaktifkan.');
    }

    public function verifyGoogle2fa(Request $request)
    {
        $request->validate(['secretKey' => 'required|digits:6']);
        
        $user = Auth::user();
        if (!$user || !$user->google2fa_secret) {
            return redirect()->route('google2fa.enable')->withErrors(['error' => 'Tidak ada kunci Google2FA ditemukan.']);
        }

        $google2fa = app('google2fa'); // Menggunakan container service
        if ($google2fa->verifyKey($user->google2fa_secret, $request->secretKey)) {
            session(['google2fa_passed' => true]);
            return redirect()->route('menus')->with('message', 'Google2FA berhasil diverifikasi!');
        }

        return redirect()->back()->withErrors(['secretKey' => 'Kode OTP tidak valid.']);
    }
}
