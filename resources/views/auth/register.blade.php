<x-guest-layout>
    <x-auth-card>

        <!-- Logo -->
        <x-slot name="logo">
            <a href="/">
                <img class="w-20 h-20 mt-2" src="{{ asset('assets/img/icon.png') }}" alt="Logo">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Form Registrasi -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NIK -->
            <div>
                <x-label for="nik" :value="__('NIK')" />
                <x-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required autofocus />
                @error('nik')
                    <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('No. HP')" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                @error('nik')
                    <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <!-- Link Login and Register -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-3 bg-blue-500 text-white font-bold rounded-md py-3 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-600 hover:scale-105 duration-300 ease-in-out">
                    {{ __('Register') }}
                </x-button>
            </div>

            <!-- Button Back to Main Menu -->
            <div class="mt-1">
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

@include('sweetalert::alert')