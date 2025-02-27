<?php

use App\Livewire\AccountComponent;
use App\Livewire\CreateSummaryComponent;
use App\Livewire\PreferencesComponent;
use App\Livewire\SettingsComponent;
use App\Livewire\ShowSummaryComponent;
use App\Livewire\SummariesComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/preferences', PreferencesComponent::class);
    Route::get('/summaries', SummariesComponent::class)->name('summaries');
    Route::get('/summary/create', CreateSummaryComponent::class)->name('summary.create');
    Route::get('/summary/{summary}', ShowSummaryComponent::class)->name('summary.show');
    Route::get('/account', AccountComponent::class)->name('account');
    Route::get('/settings', SettingsComponent::class)->name('settings');
});
