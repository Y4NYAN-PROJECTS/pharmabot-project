<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware(['auth', 'verified', 'admin', 'approved'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Medicine
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/medicine', [MedicineController::class, 'medicinePage'])->name('admin.medicine');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::post('/medicine/add-medicine', [MedicineController::class, 'add'])->name('admin.medicine-add');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::delete('/medicine/delete-medicine/{id}', [MedicineController::class, 'delete'])->name('admin.medicine-delete');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::patch('/medicine/update-medicine/{id}', [MedicineController::class, 'update'])->name('admin.medicine-update');
});

// Student List
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/student-list', [StudentController::class, 'landing'])->name('admin.student-list');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::patch('/student-approve/{id}', [StudentController::class, 'approve'])->name('admin.student-approve');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::delete('/student-delete/{id}', [StudentController::class, 'delete'])->name('admin.student-delete');
});

// Admin List
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin-list', [AdminController::class, 'landing'])->name('admin.admin-list');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::patch('/admin-approve/{id}', [AdminController::class, 'approve'])->name('admin.admin-approve');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::delete('/admin-delete/{id}', [AdminController::class, 'delete'])->name('admin.admin-delete');
});
