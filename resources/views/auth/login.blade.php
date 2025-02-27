<x-guest-layout>
    <x-old.authentication-card>
        <x-slot name="logo">
            <x-old.authentication-card-logo />
        </x-slot>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <x-input
                icon="envelope"
                label="Email"
                placeholder="john@example.com"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                shadow="none"
            />

            <x-password
                class="mt-4"
                placeholder="********"
                type="password"
                name="password"
                icon="lock-closed"
                shadow="none"
                label="Password"
            />

            <x-checkbox
                class="mt-4"
                name="remember"
                label="Remember me"
            />

            <div class="flex items-center mt-4 gap-5">
                <hr class="block w-full"  />
                <span>or</span>
                <hr class="block w-full" />
            </div>

            @livewire('shared.google-o-auth-component')

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a wire:navigate class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button wire:ignore type="submit" class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-old.authentication-card>
</x-guest-layout>
