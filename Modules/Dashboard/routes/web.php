<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::get('/dashboard', function () {
    return view('dashboard::index');
})->name('dashboard');

