<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

// Route::get('/user_dashboard', function () {
//     if (!Auth::check()) {
//         return redirect('/user_login');
//     }
//     return view('user_dashboard');
// });


// Route::get('/user_login', function () {
//     return view('user_login');
// })->name('user_login');


Route::get('/flight_search', function () {
    return view('flight_search');
})->name('flight_search');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/flight_departure', function () {
    return view('flight_departure');
});

Route::get('/flight_return', function () {
    return view('flight_return');
});

Route::get('/user_dashboard', function () {
    return view('user_dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/edit_profile', function () {
    return view('edit_profile');
});

Route::get('/cancel_change', function () {
    return view('cancel_change');
});

Route::get('/contact_us', function () {
    return view('contact_us');
})->name('contact_us');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');

Route::get('/rewards', function () {
    return view('rewards');
});

Route::get('/flight_comparison', function () {
    return view('flight_comparison');
});

Route::get('/notifications', function () {
    return view('notifications');
});

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/user_login'); // bladeファイルが user_login.blade.php の場合
// })->name('logout');


// Route::get('/user/login', function () {
//     return view('user_login');
// })->name('user.login');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [UserRegistrationController::class, 'show'])->name('register.show');
Route::post('/register', [UserRegistrationController::class, 'store'])->name('register.store');

Route::get('/user_login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::get('/user_dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/flight_results', [FlightController::class, 'search'])->name('flight.search');
Route::get('/flight_all', [FlightController::class, 'showAll'])->name('flight.all');

