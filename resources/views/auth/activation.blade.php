<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-center">
        Masukkan kode OTP yang telah kami kirimkan ke email Anda untuk mengaktifkan akun.
    </div>

    @if (session('message'))
        <div class="mb-4 text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="{{ route('google2fa.verify') }}">
        @csrf

        <!-- Email Input -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- OTP Input -->
        <div class="mt-4">
            <x-input-label for="otp" :value="__('Kode OTP')" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" value="{{ old('otp') }}" required />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Aktivasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
