<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // $this->redirectIntended(default: route('menus.index', absolute: false), navigate: true);
        $this->redirect(route('menus.index', absolute: false), navigate: true);

    }
};
?>

<div>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    KasirIn <br />
                    <span style="color: hsl(218, 81%, 75%)">Solusi Kasir Terbaik untuk Bisnis Anda</span>
                </h1>

            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                        <div class="card bg-glass">
                            <div class="card-body px-4 py-5 px-md-5">
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <!-- Form Login/Register -->
                                <form wire:submit.prevent="login">
                                    @csrf
                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                            
                                        <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />
                            
                                        <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                                    </div>

                                    <!-- Remember me Checkbox -->
                                    <div class="block mt-4">
                                        <label for="remember" class="inline-flex items-center">
                                            <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <!-- Login Button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="mb-4 text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                    
                                    <div class="d-flex align-items-center justify-content-center mt-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <!-- Register button -->
                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}">
                                            <button type="button" class="btn btn-outline-danger">
                                                Register
                                            </button>
                                        </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        <!-- Or Sign Up with social buttons -->
                        <div class="text-center mb-4 mt-0">
                            <p>or sign in with:</p>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <a href="{{route('socialite.redirect', 'google')}}">
                                    <i class="fab fa-google"></i>
                                </a>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <a href="{{route('socialite.redirect', 'github')}}">
                                    <i class="fab fa-github"></i>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
