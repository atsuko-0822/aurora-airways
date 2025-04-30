<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user_registration', function () {
    return view('user_registration');
});

Route::get('/user_login', function () {
    return view('user_login');
});

Route::get('/flight_search', function () {
    return view('flight_search');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
