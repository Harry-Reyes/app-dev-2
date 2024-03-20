<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MethodController;

Route::get('/', [MethodController::class, 'index']);

Route::post('/', [MethodController::class, 'store']);

Route::get('/{method}', [MethodController::class, 'show']);

Route::match(['put', 'patch'], '/{method}', [MethodController::class, 'update']);

Route::delete('/{method}', [MethodController::class, 'destroy']);
