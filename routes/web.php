<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


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
})->name('edit.profile');

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

Route::get('/selected_flight', function () {
    return view('selected_flight');
});

Route::get('/payment', function () {
    return view('payment');
});

// Route::get('/manage_flight', function () {
//     return view('manage_flight');
// });

Route::get('/admin_login', function () {
    return view('admin_login');
});

Route::get('/user_management', function () {
    return view('user_management');
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
Route::get('/user_registration', [UserRegistrationController::class, 'show'])->name('user_registration.show');
Route::post('/user_registration', [UserRegistrationController::class, 'store'])->name('user_registration.store');


Route::get('/user_login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::get('/user_dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('user.dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/flight_results', [FlightController::class, 'search'])->name('flight.search');
Route::get('/flight_all', [FlightController::class, 'showAllFlights'])->name('flight.all');
Route::get('/flight_return/{flight}', [FlightController::class, 'showReturnFlights'])->name('return.flights');
Route::post('/flight/select/{id}', [FlightController::class, 'selectDepartureFlight'])->name('flight.selectDeparture');
Route::get('/flight/return', [FlightController::class, 'showReturnFlights'])->name('flight.selectReturn');
Route::post('/flight/reserve/round/{id}', [FlightController::class, 'reserveRoundTrip'])->name('flight.reserve.roundtrip');
Route::post('/flight/reserve/oneway', [FlightController::class, 'reserveOneWay'])->name('flight.reserve.oneway');

Route::post('/reserve/roundtrip/{returnFlightId}', [ReservationController::class, 'reserveRoundTrip'])->name('reserve.round.trip');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// 管理者ログインページ
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// 管理者用ページ（ミドルウェアを使う）
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/user_management', [AdminController::class, 'showUsers'])->name('admin.users.index');
    Route::get('/user_management/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/user_management', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/user_management/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/user_management/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('flights', App\Http\Controllers\Admin\FlightController::class);
});

Route::get('/manage_flight', [FlightController::class, 'index'])->name('manage_flight');

Route::patch('/user_management/{user}/toggle-visibility', [UserController::class, 'toggleVisibility'])->name('admin.users.toggleVisibility');
