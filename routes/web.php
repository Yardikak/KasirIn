<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Google2FAController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
    Route::get('/register', function () {
        return view('auth.register');
    })->middleware('guest')->name('register');
    
    
    Route::middleware('auth')->group(function () {
        Route::get('google2fa/enable', [Google2FAController::class, 'enableGoogle2fa'])->name('google2fa.enable');
        Route::post('google2fa/verify', [Google2FAController::class, 'verifyGoogle2fa'])->name('google2fa.verify');
    });
    
    Route::middleware('auth')->resource('/menus', MenuController::class);
    Route::middleware('auth')->resource('/customers', CustomerController::class);
    Route::middleware('auth')->resource('/categories', \App\Http\Controllers\CategoryController::class);
    Route::middleware('auth')->resource('/additionals', \App\Http\Controllers\AdditionalController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
