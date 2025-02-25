<?php

use App\Livewire\PreferencesComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/app', 'app');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/preferences', PreferencesComponent::class)->name('preferences');
});
