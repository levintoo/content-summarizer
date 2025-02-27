<x-guest-layout>
    <x-old.authentication-card>
        <x-slot name="logo">
            <x-old.authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-input
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
                autocomplete="username"
                label="Email"
                shadow="none"
                icon="envelope"
                placeholder="john@example.com"
            />

            <x-password
                class="mt-4"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                icon="lock-closed"
                label="Password"
                shadow="none"
                placeholder="********"
            />

            <x-password
                class="mt-4"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                label="Confirm Password"
                icon="lock-closed"
                shadow="none"
                placeholder="********"
            />

            <div class="flex items-center justify-end mt-4">
                <x-button wire:ignore type="submit">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-old.authentication-card>
</x-guest-layout>
