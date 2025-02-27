<x-guest-layout>
    <x-old.authentication-card>
        <x-slot name="logo">
            <x-old.authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-old.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <x-password label="Password" name="password" required autocomplete="current-password" autofocus />

            <div class="flex justify-end mt-4">
                <x-button wire:ignore type="submit" class="ms-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-old.authentication-card>
</x-guest-layout>
