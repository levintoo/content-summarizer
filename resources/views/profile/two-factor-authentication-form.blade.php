<x-old.action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentication') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add additional security to your account using two factor authentication.') }}
    </x-slot>

    <x-slot name="content">
        @if ($this->enabled)
            @if ($showingConfirmation)
            @else
                <x-alert info title="Info" class="border">
                    {{ __('You have enabled two factor authentication.') }}
                </x-alert>
            @endif
        @else
            <x-alert warning title="Warning" class="border">
                {{ __('You have not enabled two factor authentication.') }}
            </x-alert>
        @endif

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="max-w-xl text-sm text-gray-600">
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

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-input label="Code" shadow="none" name="code" type="text" name="code" inputmode="numeric" autofocus autocomplete="one-time-code"
                                 wire:model="code"
                                 wire:keydown.enter="confirmTwoFactorAuthentication" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-old.confirms-password type="submit" wire:then="enableTwoFactorAuthentication">
                    <x-button wire:ignore type="submit" wire:loading.attr="disabled">
                        {{ __('Enable') }}
                    </x-button>
                </x-old.confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-old.confirms-password wire:then="regenerateRecoveryCodes">
                        <x-button wire:ignore light class="me-3">
                            {{ __('Regenerate Recovery Codes') }}
                        </x-button>
                    </x-old.confirms-password>
                @elseif ($showingConfirmation)
                    <x-old.confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="submit" wire:ignore type="button" class="me-3" wire:loading.attr="disabled">
                            {{ __('Confirm') }}
                        </x-button>
                    </x-old.confirms-password>
                @else
                    <x-old.confirms-password wire:then="showRecoveryCodes">
                        <x-button wire:ignore class="me-3">
                            {{ __('Show Recovery Codes') }}
                        </x-button>
                    </x-old.confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-old.confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button wire:ignore outline wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-button>
                    </x-old.confirms-password>
                @else
                    <x-old.confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-button wire:ignore rose outline wire:loading.attr="disabled">
                            {{ __('Disable') }}
                        </x-button>
                    </x-old.confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-old.action-section>
