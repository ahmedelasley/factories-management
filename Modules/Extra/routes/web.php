<?php

use Illuminate\Support\Facades\Route;
use Modules\Extra\Http\Controllers\ExtraController;
use Modules\Extra\Http\Controllers\AttributeController;
use Modules\Extra\Http\Controllers\ValueController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource( 'extras', ExtraController::class)->names('extras');

    Route::resource( 'attributes',  AttributeController::class)->names('attributes');
    Route::resource( 'values',  ValueController::class)->names('values');
    // Route::post('{attribute}/attach-values', [AttributeController::class, 'attachValues']);

});
