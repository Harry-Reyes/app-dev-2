<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);

Route::get("/test", function () {
    return "This is a test page.";
});

// Route::match(['get', 'post', 'put', 'patch']);
