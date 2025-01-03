<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16"> 
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <x-application-logo></x-application-logo>
            </a>
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <x-nav-link :href="route('orders.index')" wire:navigate :active="request()->routeIs('orders')">
                    <i class="bx bx-restaurant"></i>
                    {{ __('Cashier') }}
                </x-nav-link>
                
                <x-nav-link :href="route('menus.index')" wire:navigate :active="request()->routeIs('menus')">
                    <i class="bx bx-dish"></i>
                    {{ __('Menu') }}
                </x-nav-link>

                <x-nav-link :href="route('categories.index')" wire:navigate :active="request()->routeIs('categories')">
                    <i class="bx bxs-category"></i>
                    {{ __('Category') }}
                </x-nav-link>

                <x-nav-link :href="route('category_menus.index')" wire:navigate :active="request()->routeIs('category_menus')">
                    <i class="bx bxs-category"></i>
                    {{ __('Category Menu') }}
                </x-nav-link>

                <x-nav-link :href="route('additionals.index')" wire:navigate :active="request()->routeIs('additionals')">
                    <i class="bx bx-cookie"></i>
                    {{ __('Additional') }}
                </x-nav-link>

                <x-nav-link :href="route('customers.index')" wire:navigate :active="request()->routeIs('customers')">
                    <i class="bx bx-id-card"></i>
                    {{ __('Customer') }}
                </x-nav-link>

                <x-nav-link :href="route('tables.index')" wire:navigate :active="request()->routeIs('tables')">
                    <i class="bx bx-chair"></i>
                    {{ __('Table') }}
                </x-nav-link>

                
            </div>
            <!-- Right Side: Settings Dropdown & Hamburger -->
            <div class="flex items-center ml-auto">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('menus.index')" wire:navigate :active="request()->routeIs('menus')">
                    {{ __('Menu') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
