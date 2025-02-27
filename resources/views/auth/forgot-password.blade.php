<x-guest-layout>
    <x-old.authentication-card>
        <x-slot name="logo">
            <x-old.authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-input
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                label="Email"
                shadow="none"
                icon="envelope"
                placeholder="john@example.com"
            />

            <div class="flex items-center justify-end mt-4">
                <x-button wire:ignore type="submit">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-old.authentication-card>
</x-guest-layout>
