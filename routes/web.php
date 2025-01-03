<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryMenuController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\Auth\SocialiteController;

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
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

    Route::middleware('auth')->resource('/menus', MenuController::class);
    Route::middleware('auth')->resource('/categories', CategoryController::class);
    Route::middleware('auth')->resource('/additionals', AdditionalController::class);
    Route::middleware('auth')->resource('/variants', VariantController::class);
    Route::middleware('auth')->resource('/customers', CustomerController::class);
    Route::middleware('auth')->resource('/tables', \App\Http\Controllers\TableController::class);
    
    Route::middleware('auth')->group(function () {
        Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
        Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');
        Route::post('/', [TableController::class, 'store'])->name('tables.store');
        Route::get('/tables/{table}/edit', [TableController::class, 'edit'])->name('tables.edit');
        Route::put('/tables/{table}', [TableController::class, 'update'])->name('tables.update');
        Route::delete('/tables/{table}', [TableController::class, 'destroy'])->name('tables.destroy');
        Route::get('/tables/position/{position}', [TableController::class, 'filterByPosition'])->name('tables.filterByPosition');
        Route::get('/tables/{table}', [TableController::class, 'show'])->name('tables.show');
    });
    
    
    Route::middleware('auth')->group(function () {
        Route::resource('category_menus', CategoryMenuController::class)->except(['show']);
        Route::get('category_menus/{category}/show', [CategoryMenuController::class, 'show'])->name('category_menus.show');
        Route::get('category_menus/{category}/search', [CategoryMenuController::class, 'search'])->name('category_menus.search');
        Route::post('category_menus/{category}/add/{menu}', [CategoryMenuController::class, 'add'])->name('category_menus.add');
        Route::delete('category_menus/{category}/remove/{menu}', [CategoryMenuController::class, 'remove'])->name('category_menus.remove');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/add-to-cart', [OrderController::class, 'addToCart'])->name('orders.addToCart');
        Route::post('/orders/remove-from-cart', [OrderController::class, 'removeFromCart'])->name('orders.removeFromCart');
        Route::post('/orders/updateQuantity', [OrderController::class, 'updateQuantity'])->name('orders.updateQuantity');
        Route::post('/orders/getTotalPrice', [OrderController::class, 'getTotalPrice'])->name('orders.getTotalPrice');
        Route::post('/orders/{order}/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
        Route::get('/orders/search-customer', [OrderController::class, 'searchCustomer'])->name('orders.searchCustomer');
        Route::post('/orders/create-customer', [OrderController::class, 'createCustomer'])->name('orders.createCustomer');
    });
    
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/menus', [MenuController::class])->name('admin.menus');
    });
    
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/menus', [MenuController::class,])->name('user.menus');
    });

require __DIR__.'/auth.php';