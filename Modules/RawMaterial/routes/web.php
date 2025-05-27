<?php

use Illuminate\Support\Facades\Route;
use Modules\RawMaterial\Http\Controllers\RawMaterialController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('rawmaterials', RawMaterialController::class)->names('rawmaterial');
});
