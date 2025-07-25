<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFlightController;
use App\Http\Controllers\StripePaymentController;




Route::get('/test', function () {
    return view('test');
});


Route::get('/flight_search', function () {
    return view('flight_search');
})->name('flight_search');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/flight_departure', function () {
    return view('flight_departure');
});

Route::get('/flight_return', function () {
    return view('flight_return');
});


Route::get('/edit_profile', function () {
    return view('edit_profile');
})->name('edit.profile');


Route::get('/contact_us', function () {
    return view('contact_us');
})->name('contact_us');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');

Route::get('/rewards', function () {
    return view('rewards');
})->name('rewards');

Route::get('/flight_comparison', function () {
    return view('flight_comparison');
});

Route::get('/notifications', function () {
    return view('notifications');
});

Route::get('/selected_flight', function () {
    return view('selected_flight');
});

// Route::get('/payment', function () {
//     return view('payment');
// });

Route::get('/payment', function () {
    return view('stripe.payment');
});


Route::get('/admin_login', function () {
    return view('admin_login');
});

Route::get('/user_registration', [UserRegistrationController::class, 'show'])->name('user_registration.show');
Route::post('/user_registration', [UserRegistrationController::class, 'store'])->name('user_registration.store');


Route::get('/user_login', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::get('/user_dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/flight_results', [FlightController::class, 'search'])->name('flight.search');
Route::get('/flight_all', [FlightController::class, 'showAllFlights'])->name('flight.all');
Route::get('/flight_return/{flight}', [FlightController::class, 'showReturnFlights'])->name('return.flights');

Route::get('/flight/return', [FlightController::class, 'showReturnFlights'])->name('flight.selectReturn');
Route::post('/flight/reserve/oneway', [FlightController::class, 'reserveOneWay'])->name('flight.reserve.oneway');
Route::post('/flights/cancel', [FlightController::class, 'cancel'])->name('flight.cancel');
Route::get('/flights/change/departing', [FlightController::class, 'showDepartingOptions'])->name('flight.change.departing');
Route::get('/flights/change/returning', [FlightController::class, 'showReturningOptions'])->name('flight.change.returning');
Route::delete('/reservation/{id}/cancel', [FlightController::class, 'cancel'])->name('reservation.cancel');

Route::get('/flights/change/departing', [FlightController::class, 'changeDeparting'])->name('flight.changeDeparting');
Route::get('/flights/change/search/departing', [FlightController::class, 'changeSearchDeparting'])->name('flight.changeSearchDeparting');
Route::get('/flights/change/returning', [FlightController::class, 'changeReturning'])->name('flight.changeReturning');
Route::get('/flights/change/search/returning', [FlightController::class, 'changeSearchReturning'])->name('flight.changeSearchReturning');


Route::get('/flights/manage/departing', [ReservationController::class, 'showCancelOrChangePage'])->name('flight.manage');
Route::get('/cancel_change', [ReservationController::class, 'showCancelOrChangePage'])->name('cancel_change');

Route::post('/reserve/roundtrip/{returnFlightId}', [ReservationController::class, 'reserveRoundTrip'])->name('reserve.round.trip');
Route::post('/reserve/departure/{departureFlightId}', [ReservationController::class, 'reserveDeparture'])->name('reserve.departure');
Route::post('/reserve/return/{returnFlightId}', [ReservationController::class, 'reserveReturn'])->name('reserve.return');
Route::post('/reserve/return/create/{returnFlightId}', [ReservationController::class, 'createReturnReservation'])->name('reserve.return.create');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// 管理者ログインページ
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// 管理者用ルート（ミドルウェア付き）
Route::middleware(['auth:admin'])->group(function () {
    // 管理者ダッシュボード
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // ユーザー管理
    Route::get('/user_management', [AdminController::class, 'showUsers'])->name('admin.users.index');
    Route::get('/user_management/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/user_management', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/user_management/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/user_management/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::patch('/user_management/{user}/toggle-visibility', [UserController::class, 'toggleVisibility'])->name('admin.users.toggleVisibility');

    // フライト管理
    Route::get('/manage_flight', [AdminFlightController::class, 'index'])->name('admin.flights.index');
    Route::get('/manage_flight/create', [FlightController::class, 'create'])->name('admin.flights.create');
    Route::post('/manage_flight', [FlightController::class, 'store'])->name('admin.flights.store');
    Route::post('/manage_flight/{id}', [AdminFlightController::class, 'update'])->name('admin.flights.update');
    Route::patch('/manage_flight/{id}/toggle', [FlightController::class, 'toggleVisibility'])->name('admin.flights.toggleVisibility');
    Route::get('/flights/{id}/edit', [AdminFlightController::class, 'edit'])->name('flights.edit');
});

// Social login routes
Route::get('/auth/google', [UserController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook', [UserController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/auth/facebook/callback', [UserController::class, 'handleFacebookCallback']);

// Stripe payment routes
Route::get('/checkout', [StripePaymentController::class, 'redirectToCheckout'])->name('checkout');
Route::get('/success', function () {
    return 'payment success！';
})->name('checkout.success');

Route::get('/cancel', function () {
    return 'payment cancelled！';
})->name('checkout.cancel');


