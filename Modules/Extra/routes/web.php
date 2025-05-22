<?php

use Illuminate\Support\Facades\Route;
use Modules\Extra\Http\Controllers\ExtraController;
use Modules\Extra\Http\Controllers\CategoryController;
use Modules\Extra\Http\Controllers\AttributeController;
use Modules\Extra\Http\Controllers\ValueController;
use Modules\Extra\Http\Controllers\AttachmentController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource( 'extras', ExtraController::class)->names('extras');

    Route::resource( 'categories',  CategoryController::class)->names('categories');
    Route::resource( 'attributes',  AttributeController::class)->names('attributes');
    Route::resource( 'values',  ValueController::class)->names('values');
    Route::resource( 'attachments',  AttachmentController::class)->names('attachments');
});
