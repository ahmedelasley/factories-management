<?php

use Illuminate\Support\Facades\Route;
use Modules\Material\Http\Controllers\MaterialController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('materials', MaterialController::class)->names('material');
});
