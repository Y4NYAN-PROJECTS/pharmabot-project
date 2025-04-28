<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'student', 'approved'])->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});