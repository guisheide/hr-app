<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\Admin;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');
    
    Route::prefix('companies')->group(function () {
        Volt::route('/', 'companies.index')->name('companies.index');
        Volt::route('create', 'companies.create')->name('companies.create');
        Volt::route('{id}/edit', 'companies.edit')->name('companies.edit');
    });

    Route::middleware('company.context')->group(function(){
        
    Route::prefix('departments')->group(function () {
        Volt::route('/', 'departments.index')->name('departments.index');
        Volt::route('create', 'departments.create')->name('departments.create');
        Volt::route('{id}/edit', 'departments.edit')->name('departments.edit');
    });

    Route::prefix('designations')->group(function () {
        Volt::route('/', 'designations.index')->name('designations.index');
        Volt::route('create', 'designations.create')->name('designations.create');
        Volt::route('{id}/edit', 'designations.edit')->name('designations.edit');
    });

    Route::prefix('employees')->group(function () {
        Volt::route('/', 'employees.index')->name('employees.index');
        Volt::route('create', 'employees.create')->name('employees.create');
        Volt::route('{id}/edit', 'employees.edit')->name('employees.edit');
    });

    Route::prefix('contracts')->group(function () {
        Volt::route('/', 'contracts.index')->name('contracts.index');
        Volt::route('create', 'contracts.create')->name('contracts.create');
        Volt::route('{id}/edit', 'contracts.edit')->name('contracts.edit');
    });

    Route::prefix('payrolls')->group(function () {
        Volt::route('/', 'payrolls.index')->name('payrolls.index');
        Volt::route('{id}/show', 'payrolls.show')->name('payrolls.show');
    });

    });

});
    
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
