<?php

use Illuminate\Support\Facades\Route;
use Modules\Supplier\Http\Controllers\SupplierController;
use Modules\Supplier\Http\Controllers\CompanyController;

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('suppliers', SupplierController::class)->names('supplier');
    Route::resource( 'suppliers',  SupplierController::class)->names('suppliers');
    Route::resource( 'companies',  CompanyController::class)->names('companies');

});
