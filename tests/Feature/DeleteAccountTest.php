<?php

use App\Models\User;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;

test('user accounts can be deleted', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(DeleteUserForm::class)
        ->set('password', 'password')
        ->call('deleteUser');

    $deletedUser = $user->fresh();

    $this->assertSoftDeleted('users', [
        'id' => $deletedUser->id,
        'name' => $deletedUser->name,
        'email' => $deletedUser->email,
    ]);

    expect($deletedUser->deleted_at)->not()->toBeNull();
})->skip(function () {
    return ! Features::hasAccountDeletionFeatures();
}, 'Account deletion is not enabled.');

test('correct password must be provided before account can be deleted', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(DeleteUserForm::class)
        ->set('password', 'wrong-password')
        ->call('deleteUser')
        ->assertHasErrors(['password']);

    expect($user->fresh()->deleted_at)->toBeNull()->and($user->fresh())->not->toBeNull();
})->skip(function () {
    return ! Features::hasAccountDeletionFeatures();
}, 'Account deletion is not enabled.');
