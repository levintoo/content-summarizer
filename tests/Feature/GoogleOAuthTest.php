<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

function fakeGoogleUser(string $email): void
{
    $googleUser = (new SocialiteUser)->map(['name' => 'Google Person', 'email' => $email]);

    Socialite::shouldReceive('driver->user')->andReturn($googleUser);
}

test('new google users are created with a verified email', function () {
    fakeGoogleUser('new@example.com');

    $this->get('/auth/google/callback')->assertRedirect(route('summary.create'));

    $user = User::where('email', 'new@example.com')->firstOrFail();

    expect($user->hasVerifiedEmail())->toBeTrue();
    $this->assertAuthenticatedAs($user);
});

test('google sign in resets credentials on an unverified account with the same email', function () {
    $existing = User::factory()->unverified()->create([
        'email' => 'victim@example.com',
        'password' => 'attacker-password',
        'two_factor_secret' => encrypt('secret'),
        'two_factor_confirmed_at' => now(),
    ]);

    fakeGoogleUser('victim@example.com');

    $this->get('/auth/google/callback')->assertRedirect(route('summary.create'));

    $existing->refresh();

    expect($existing->hasVerifiedEmail())->toBeTrue()
        ->and(Hash::check('attacker-password', $existing->password))->toBeFalse()
        ->and($existing->two_factor_secret)->toBeNull();
});

test('google sign in keeps credentials on a verified account', function () {
    $existing = User::factory()->create(['email' => 'owner@example.com', 'password' => 'owner-password']);

    fakeGoogleUser('owner@example.com');

    $this->get('/auth/google/callback');

    expect(Hash::check('owner-password', $existing->fresh()->password))->toBeTrue();
});
