<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\ScholarshipCreate;
use App\Livewire\Admin\Student\StudentCreate;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Settings\BackUpController;
use App\Http\Controllers\Admin\Settings\StudentController;
use App\Http\Controllers\Admin\StudentScholarshipController;
use App\Http\Controllers\Admin\Settings\ScholarshipController;

Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/', function () {
        return view('admin.dashboard.dashboard');
    })->name('admin.dashboard');

    // Scholarship Routes
    Route::get('admin/students/scholarship', [StudentScholarshipController::class, 'index'])->name('admin.student.scholarship');
    Route::get('admin/students/scholarship/create', ScholarshipCreate::class)->name('admin.scholarship.create');

    // Students Routes
    Route::get('admin/students', [StudentController::class, 'index'])->name('admin.students');
    Route::get('admin/students/create', StudentCreate::class)->name('admin.students.create');

    //Settings->scholar
    Route::get('admin/scholars', [ScholarshipController::class, 'index'])->name('admin.scholar');
    //create
    Route::get('admin/scholars/create', [ScholarshipController::class, 'create'])->name('admin.scholar.create');
    Route::post('admin/scholars/store', [ScholarshipController::class, 'store'])->name('admin.scholar.store');

    Route::get('admin/scholars/edit/{scholar}', [ScholarshipController::class, 'edit'])->name('admin.scholar.edit');
    Route::put('admin/scholars/update/{scholar}', [ScholarshipController::class, 'update'])->name('admin.scholar.update');

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


Route::get('restore/database', [BackUpController::class, 'restoreDatabase'])
->name('database.restore');

