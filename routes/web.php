<?php

use App\Http\Controllers\Auth\GoogleOAuthController;
use App\Livewire\AccountComponent;
use App\Livewire\CreateSummaryComponent;
use App\Livewire\Public\SharedSummaryComponent;
use App\Livewire\Public\WelcomeComponent;
use App\Livewire\SettingsComponent;
use App\Livewire\ShowSummaryComponent;
use App\Livewire\SummariesComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeComponent::class);

Route::get('/shared/{summary}', SharedSummaryComponent::class)->name('summary.shared');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/summaries', SummariesComponent::class)->name('summaries');
    Route::get('/summary/create', CreateSummaryComponent::class)->name('summary.create');
    Route::get('/summary/{summary}', ShowSummaryComponent::class)->name('summary.show');
    Route::get('/account', AccountComponent::class)->name('account');
    Route::get('/settings', SettingsComponent::class)->name('settings');
});

Route::get('/auth/google/callback', GoogleOAuthController::class);
