<?php

use Illuminate\Support\Facades\Route;
use Modules\Extra\Http\Controllers\ExtraController;
use Modules\Extra\Http\Controllers\AttributeController;
use Modules\Extra\Livewire\Attributes\Index;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource( 'extras', ExtraController::class)->names('extras');

    Route::resource( 'attributes', AttributeController::class)->names('attributes');
    Route::post('{attribute}/attach-values', [AttributeController::class, 'attachValues']);

    // Route::prefix('attributes')->group(function () {
    //     Route::get('/', Index::class)->name('attributes.index');
    //     // Route::get('/create', Create::class)->name('attributes.create');
    //     // Route::get('/{attribute}/edit', Edit::class)->name('attributes.edit');
    //     // Route::get('/{attribute}/attach-values', AttachValues::class)->name('attributes.attach-values');
    // });


});
