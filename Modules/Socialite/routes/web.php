<?php

use Illuminate\Support\Facades\Route;
use Modules\Socialite\Http\Controllers\SocialiteController;

// مسارات تسجيل الدخول عبر Socialite
Route::get('auth/{provider}', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
