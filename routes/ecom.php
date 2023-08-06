<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::group(['middleware' => [Authenticate::class]], function () {
      // in auth
    });
});
