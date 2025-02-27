<x-old.form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <x-password icon="lock-closed" placeholder="********" shadow="none" id="current_password" name="current_password" label="Current Password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
        </div>

        <div class="col-span-6">
            <x-password icon="lock-closed" placeholder="********" shadow="none" name="password" label="New Password" for="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
        </div>

        <div class="col-span-6">
            <x-password icon="lock-closed" placeholder="********" shadow="none" name="password_confirmation" label="Confirm Password" id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-old.action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-old.action-message>

        <x-button wire:ignore type="submit">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-old.form-section>
