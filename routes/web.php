<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/flight_departure', function () {
    return view('flight_departure');
});

Route::get('/flight_return', function () {
    return view('flight_return');
});

Route::get('/user_dashboard', function () {
    return view('user_dashboard');
});

Route::get('/edit_profile', function () {
    return view('edit_profile');
});

Route::get('/cancel_change', function () {
    return view('cancel_change');
});

Route::get('/contact_us', function () {
    return view('contact_us');
});

Route::get('/FAQ', function () {
    return view('FAQ');
});

Route::get('/rewards', function () {
    return view('rewards');
});

Route::get('/flight_comparison', function () {
    return view('flight_comparison');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
