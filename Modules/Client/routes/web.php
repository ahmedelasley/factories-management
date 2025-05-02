<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('client', ClientController::class)->names('client');
});
