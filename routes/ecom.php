<?php


use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use Varenyky\Http\Middleware\Authenticate;

use VarenykyECom\Http\Controllers\CategoryController;
use VarenykyECom\Http\Controllers\BrandController;
use VarenykyECom\Http\Controllers\TaxRateController;
use VarenykyECom\Http\Controllers\TaxClassController;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::group(['middleware' => [Authenticate::class]], function () {
        Route::resource('/categories', CategoryController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/taxrates', TaxRateController::class);
        Route::resource('/taxclasses', TaxClassController::class);
    });
});