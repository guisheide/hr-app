<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Livewire\Admin;
use App\Livewire\Admin\Companies\Create;
use App\Livewire\Admin\Companies\Edit;
use App\Livewire\Admin\Companies\Index;
use App\Livewire\Admin\Contracts\Create as ContractsCreate;
use App\Livewire\Admin\Contracts\Edit as ContractsEdit;
use App\Livewire\Admin\Contracts\Index as ContractsIndex;
use App\Livewire\Admin\Departments\Create as DepartmentsCreate;
use App\Livewire\Admin\Departments\Edit as DepartmentsEdit;
use App\Livewire\Admin\Departments\Index as DepartmentsIndex;
use App\Livewire\Admin\Designations\Create as DesignationsCreate;
use App\Livewire\Admin\Designations\Edit as DesignationsEdit;
use App\Livewire\Admin\Designations\Index as DesignationsIndex;
use App\Livewire\Admin\Employees\Create as EmployeesCreate;
use App\Livewire\Admin\Employees\Edit as EmployeesEdit;
use App\Livewire\Admin\Employees\Index as EmployeesIndex;
use App\Livewire\Admin\Payments\Index as PaymentsIndex;
use App\Livewire\Admin\Payments\Show as PaymentsShow;
use App\Livewire\Admin\Payroll\Index as PayrollIndex;
use App\Livewire\Admin\Payroll\Show;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');
    
    Route::prefix('companies')->group(function () {
        Route::get('/', Index::class)->name('companies.index');
        Route::get('/create', Create::class)->name('companies.create');
        Route::get('/{id}/edit', Edit::class)->name('companies.edit');
    });

     Route::middleware('company.context')->group(function(){
        Route::prefix('departments')->group(function () {
            Route::get('/', DepartmentsIndex::class)->name('departments.index');
            Route::get('create', DepartmentsCreate::class)->name('departments.create');
            Route::get('{id}/edit', DepartmentsEdit::class)->name('departments.edit');
    });

        Route::prefix('designations')->group(function () {
            Route::get('/', DesignationsIndex::class)->name('designations.index');
            Route::get('create', DesignationsCreate::class)->name('designations.create');
            Route::get('{id}/edit', DesignationsEdit::class)->name('designations.edit');
    });

        Route::prefix('employees')->group(function () {
            Route::get('/', EmployeesIndex::class)->name('employees.index');
            Route::get('create', EmployeesCreate::class)->name('employees.create');
            Route::get('{id}/edit', EmployeesEdit::class)->name('employees.edit');
    });

        Route::prefix('contracts')->group(function () {
            Route::get('/', ContractsIndex::class)->name('contracts.index');
            Route::get('create', ContractsCreate::class)->name('contracts.create');
            Route::get('{id}/edit', ContractsEdit::class)->name('contracts.edit');
    });

        Route::prefix('payrolls')->group(function () {
            Route::get('/', PayrollIndex::class)->name('payrolls.index');
            Route::get('{id}/show', Show::class)->name('payrolls.show');
    });

        Route::prefix('payments')->group(function () {
            Route::get('/', PaymentsIndex::class)->name('payments.index');
            Route::get('{id}/show', PaymentsShow::class)->name('payments.show');
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
