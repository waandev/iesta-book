@section('title', 'Login')

@push('styles')
    <style>
        .separator {
            margin: 1.5rem 0;
            text-align: center;
            position: relative;
        }

        .separator span {
            position: relative;
            z-index: 1;
            padding: 0 0.9rem;
            background: #ffffff;
        }

        .separator::after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 0.1px;
            background: #b3b3b3;
        }
    </style>
@endpush

<x-guest-layout>
    <x-authentication-card class="bg-white shadow-lg rounded-lg p-6">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4 text-red-500" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <!-- Google Login Button -->
        <div
            class="mb-4 p-6 border border-gray-300 rounded-lg shadow-md bg-white w-20 h-10 mx-auto flex items-center justify-center">
            <a href="{{ url('/auth/google') }}" class="flex items-center justify-center w-full h-full">
                <img src="{{ asset('assets/frontsite/assets/img/icon-google.svg') }}" alt="Google" class="w-5 h-5" />
            </a>
        </div>

        <p class="separator"><span class="text-gray-600">or</span></p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="w-full flex justify-center">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

        </form>

        <div class="flex items-center justify-center mt-4">
            <span class="text-sm text-gray-600" style="margin-right: 4px">{{ __('Don\'t have an account?') }}</span>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>



    </x-authentication-card>
</x-guest-layout>
