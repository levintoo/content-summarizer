<x-guest-layout>
    <x-old.authentication-card>
        <x-slot name="logo">
            <x-old.authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input
                label="Name"
                placeholder="John Doe"
                icon="user"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                shadow="none"
            />

            <x-input
                class="mt-4"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                label="Email"
                icon="envelope"
                shadow="none"
                placeholder="john@example.com"
            />

            <x-password
                class="mt-4"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                label="Password"
                icon="lock-closed"
                placeholder="********"
                shadow="none"
            />

            <x-password
                class="mt-4"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                label="Confirm Password"
                icon="lock-closed"
                placeholder="********"
                shadow="none"
            />

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-old.label for="terms">
                        <div class="flex items-center">
                            <x-old.checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-old.label>
                </div>
            @endif

            <div class="flex items-center mt-4 gap-5">
                <hr class="block w-full"  />
                <span>or</span>
                <hr class="block w-full" />
            </div>

            @livewire('shared.google-o-auth-component')

            <div class="flex items-center justify-end mt-4">
                <a wire:navigate class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button wire:ignore type="submit" class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-old.authentication-card>
</x-guest-layout>
