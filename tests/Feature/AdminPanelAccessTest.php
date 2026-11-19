<?php

use App\Enums\RoleEnum;
use App\Models\User;

test('guests are redirected to login', function () {
    $this->get('/admin')->assertRedirect(route('login'));
});

test('regular users cannot open the admin panel', function () {
    $this->actingAs(User::factory()->create())
        ->get('/admin')
        ->assertForbidden();
});

test('admins can open the admin panel', function () {
    $admin = User::factory()->create();
    $admin->assignRole(RoleEnum::ADMIN);

    $this->actingAs($admin)
        ->get('/admin')
        ->assertOk();
});
