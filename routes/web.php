<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Google2FAController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware('auth')->group(function () {
        Route::get('google2fa/setup', [Google2FAController::class, 'setup'])->name('google2fa.setup');
        Route::post('google2fa/verify', [Google2FAController::class, 'verify'])->name('google2fa.verify');
    });

    Route::middleware('auth')->resource('/menus', \App\Http\Controllers\MenuController::class);

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
