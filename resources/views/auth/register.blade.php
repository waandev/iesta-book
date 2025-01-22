@section('title', 'Register')

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
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <!-- Google Login Button -->
        <div
            class="mb-4 p-6 border border-gray-300 rounded-lg shadow-md bg-white w-20 h-10 mx-auto flex items-center justify-center">
            <a href="{{ url('/auth/google') }}" class="flex items-center justify-center w-full h-full">
                <img src="{{ asset('assets/frontsite/assets/img/icon-google.svg') }}" alt="Google" class="w-5 h-5" />
            </a>
        </div>

        <p class="separator"><span class="text-gray-600">or</span></p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- reCAPTCHA -->
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            @error('g-recaptcha-response')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <x-button class="w-full flex justify-center">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', {
            action: 'register'
        }).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>
