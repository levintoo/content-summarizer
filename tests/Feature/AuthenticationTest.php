<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('summary.create', absolute: false));
});

test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('signed in users opening the login page are sent into the app', function () {
    $this->actingAs(User::factory()->create())
        ->get('/login')
        ->assertRedirect(route('summary.create'));
});

test('the landing page offers to open the app when signed in', function () {
    $this->actingAs(User::factory()->create())
        ->get('/')
        ->assertSee('Open app')
        ->assertDontSee(route('login'));
});
