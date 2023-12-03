<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\ScholarshipCreate;
use App\Livewire\Admin\Student\StudentCreate;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\Settings\BackUpController;
use App\Http\Controllers\Admin\Settings\StudentController;

Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/', function () {
        return view('admin.dashboard.dashboard');
    })->name('admin.dashboard');

    // Scholarship Routes
    Route::get('admin/scholarship', [ScholarshipController::class, 'index'])->name('admin.scholarship');
    Route::get('admin/scholarship/create', ScholarshipCreate::class)->name('admin.scholarship.create');

    // Students Routes
    Route::get('admin/students', [StudentController::class, 'index'])->name('admin.students');
    Route::get('admin/students/create', StudentCreate::class)->name('admin.students.create');

    // User Routes
    Route::get('admin/settings/profile', [UserController::class, 'index'])->name('admin.profile');
    Route::post('update-profile', [UserController::class, 'updateProfile'])->name('admin.update.profile');

    Route::get('admin/settings/accounts', [UserController::class, 'accounts'])->name('admin.accounts');
    Route::get('admin/settings/accounts/create', [UserController::class, 'addAccount'])->name('admin.account.create');

    // User Create
    Route::post('/create-user', [UserController::class, 'store'])->name('create.user');
    //Backup
    Route::get('admin/settings/backup', [BackUpController::class, 'index'])
    ->name('admin.settings.backup');

    Route::post('/restore', [BackUpController::class, 'restore'])->name('restore.database');
    Route::post('backup', [BackUpController::class, 'backup'])->name('manual.backup');

});


//Login


Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
