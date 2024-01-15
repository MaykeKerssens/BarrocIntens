<x-guest-layout class="flex flex-col items-center justify-center min-h-screen">
    <!-- Logo in het midden -->
    <div class="mb-8 flex items-center justify-center">
        <img src="{{ asset('images/Logo4_groot.png') }}" alt="Machine Bit Light Logo" class="w-30 h-auto">
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full rounded-md border border-black focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
            <x-text-input id="password" class="block mt-1 w-full rounded-md border border-black focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center text-gray-700">
                <input id="remember_me" type="checkbox" class="mt-1 p-2 focus:ring-indigo-500 rounded-md border border-black text-indigo-600" name="remember">
                <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-800 focus:outline-none focus:underline focus:text-indigo-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Log In Button -->
        <div>
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
