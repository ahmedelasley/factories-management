<?php

use Illuminate\Support\Facades\Route;
use Modules\Socialite\Http\Controllers\SocialiteController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('socialite', SocialiteController::class)->names('socialite');
});
