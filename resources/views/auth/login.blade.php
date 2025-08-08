<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="w-20 h-20" src="{{ asset('assets/img/icon.png') }}" alt="Logo">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Login Button -->
            <div class="flex items-center justify-start mt-4">
                <x-button class="bg-blue-500 text-white font-bold rounded-md py-3 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-600 hover:scale-105 duration-300 ease-in-out">
                    {{ __('Login') }}
                </x-button>
            </div>

            <!-- Home Page -->
            <div class="mt-3">
                <a href="/" class="inline-flex items-center gap-2 text-sm text-blue-600 hover:underline">
                    <div class="bg-gray-100 p-2 rounded-full shadow-sm hover:bg-gray-200 transition">
                        <img src="{{ asset('assets/img/home.png') }}" alt="Home" class="w-6 h-6">
                    </div>
                    Back to Main Menu
                </a>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
