<?php

use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\Settings\StudentController;
use App\Livewire\Admin\ScholarshipCreate;
use App\Livewire\Admin\Student\StudentCreate;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard.dashboard');
})->name('admin.dashboard');


Route::get('admin/scholarship', [ScholarshipController::class, 'index'])->name('admin.scholarship');
//livewire
Route::get('admin/scholarship/create', ScholarshipCreate::class)->name('admin.scholarship.create');

//Settings
//Students
Route::get('admin/students',  [StudentController::class, 'index'])->name('admin.students');
Route::get('admin/students/create',  StudentCreate::class)->name('admin.students.create');

