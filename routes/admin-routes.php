<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PendingController;

Route::middleware(['auth', 'verified', 'admin', 'approved'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // [ Medicine ]
    Route::get('/medicine', [MedicineController::class, 'medicinePage'])->name('admin.medicine');
    Route::post('/medicine/add-medicine', [MedicineController::class, 'add'])->name('admin.medicine-add');
    Route::delete('/medicine/delete-medicine/{id}', [MedicineController::class, 'delete'])->name('admin.medicine-delete');
    Route::patch('/medicine/update-medicine/{id}', [MedicineController::class, 'update'])->name('admin.medicine-update');

    // [ Accounts ]
    //-- Admin
    Route::get('/admin-list', [AdminController::class, 'list'])->name('admin.admin-list');
    //-- Student
    Route::get('/student-list', [StudentController::class, 'list'])->name('admin.student-list');
    //-- Pending
    Route::get('/pending-list', [PendingController::class, 'list'])->name('admin.pending-list');
    //-- Functions
    Route::patch('/admin/approve/{id}', [PendingController::class, 'approve'])->name('admin.admin-approve');
    Route::patch('/admin/decine/{id}', [PendingController::class, 'decline'])->name('admin.admin-decline');
    // Soft Delete
    Route::patch('/admin/delete/{id}', [AdminController::class, 'softDelete'])->name('admin.admin-delete');
    Route::patch('/student/delete/{id}', [StudentController::class, 'softDelete'])->name('admin.student-delete');
});
