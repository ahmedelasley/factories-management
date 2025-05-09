<?php

use Illuminate\Support\Facades\Route;
use Modules\Extra\Http\Controllers\ExtraController;
use Modules\Extra\Http\Controllers\AttributeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource( 'extras', ExtraController::class)->names('extras');

    Route::resource( 'attributes', AttributeController::class)->names('attributes');
    Route::post('{attribute}/attach-values', [AttributeController::class, 'attachValues']);


});
