<x-old.action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentication') }}
    </x-slot>

    <x-slot name="description">
        {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
    </x-slot>

    <x-slot name="content">
        <div class="border-slate-200 border rounded-lg overflow-hidden">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    <x-alert info title="Info">
                    {{ __('Finish enabling two factor authentication.') }}
                    </x-alert>
                @else
                    <x-alert teal title="Info">
                    {{ __('You have enabled two factor authentication.') }}
                    </x-alert>
                @endif
            @else
                <x-alert warning title="Info">
                {{ __('You have not enabled two factor authentication.') }}
                </x-alert>
            @endif
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                        @else
                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-old.label for="code" value="{{ __('Code') }}" />

                        <x-old.input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                                 wire:model="code"
                                 wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-old.input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-400">
                    <p class="font-semibold">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-900 dark:text-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-old.confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('Enable') }}
                    </x-button>
                </x-old.confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-old.confirms-password wire:then="regenerateRecoveryCodes">
                        <x-button light class="me-3">
                            {{ __('Regenerate Recovery Codes') }}
                        </x-button>
                    </x-old.confirms-password>
                @elseif ($showingConfirmation)
                    <x-old.confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="me-3" wire:loading.attr="disabled">
                            {{ __('Confirm') }}
                        </x-button>
                    </x-old.confirms-password>
                @else
                    <x-old.confirms-password wire:then="showRecoveryCodes">
                        <x-button class="me-3">
                            {{ __('Show Recovery Codes') }}
                        </x-button>
                    </x-old.confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-old.confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button rose flat wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-button>
                    </x-old.confirms-password>
                @else
                    <x-old.confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button rose flat wire:loading.attr="disabled">
                            {{ __('Disable') }}
                        </x-button>
                    </x-old.confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-old.action-section>
