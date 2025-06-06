<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('client', ClientController::class)->names('client');
});
