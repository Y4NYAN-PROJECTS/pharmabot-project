<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'admin', 'approved'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});