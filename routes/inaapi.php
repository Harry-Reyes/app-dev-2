<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $default_message = "This is an inaapi route";
    if (Session::has('message')) {
        $message = Session::get('message');
        return "Message: " . $message . "<br>" . $default_message;
    }
    return $default_message;
}); // ! NOT WORKING

Route::get('/user', [UserController::class, 'index']);

Route::get("/test", function () {
    return "This is a test page.";
});

Route::get('/id/{id}', function (string $id) {
    return "Inapi #" . $id;
})->where('id', '[0-9]+');

Route::get('/{?num}', function (?int $num) {
    return $num;
});

Route::get('/logout', function () {
    return redirect('/inaapi')->with('message', 'You have logged out!');
});

Route::get('/{str}', function (string $str = "Kamusta, mga inaaping nilalang. >:D") {
    return $str;
});
