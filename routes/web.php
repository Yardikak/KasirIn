<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ActivationController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// Route::get('/activation', [ActivationController::class, 'show'])->name('activation.notice');
// Route::post('/activation', [ActivationController::class, 'activate'])->name('activation.store');

// Route::get('/register', function () {
//     return view('auth.register');
// })->middleware('guest')->name('register');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'is_active'])->name('dashboard');


require __DIR__.'/auth.php';
