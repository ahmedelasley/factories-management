<?php

use Illuminate\Support\Facades\Route;
use Modules\RawMaterial\Http\Controllers\RawMaterialController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('rawmaterials', RawMaterialController::class)->names('rawmaterial');
});
