<?php

use Illuminate\Support\Facades\Route;
use Modules\Profile\Http\Controllers\ProfileController;

// Route::middleware(['auth'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('auth::dashboard');
    // })->name('dashboard');

    Route::controller(ProfileController::class)->name('profile.')->group(function () {
        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');
    });

// });
