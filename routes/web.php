<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/test', function () {
    return view('test');
});

=======
Route::get('/user_registration', function () {
    return view('user_registration');
});

Route::get('/user_login', function () {
    return view('user_login');
});
>>>>>>> 8a2d01617e9c6e36b3f6f0dacb2bab66078184c8

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
