<p>Halo {{ Auth::user()->name }},</p>
<p>Berikut adalah kode OTP Anda : </p>
<p>{{ $otp }}</p>
<p>Kode ini berlaku selama 10 menit!</p>
<p>Terima Kasih.</p>