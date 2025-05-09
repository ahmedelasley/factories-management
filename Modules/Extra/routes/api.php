<?php

use Illuminate\Support\Facades\Route;
use Modules\Extra\Http\Controllers\ExtraController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('extras', ExtraController::class)->names('extra');
});
