<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MethodController;

Route::get('/', [MethodController::class, 'index']);

Route::get('/{method}', [MethodController::class, 'show']);

Route::middleware('check_token')->group(function () {
    Route::post('/', [MethodController::class, 'store']);

    Route::match(['put', 'patch'], '/{method}', [MethodController::class, 'update']);

    Route::delete('/{method}', [MethodController::class, 'destroy']);
});
