<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Flight;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    public function __construct(
        User $user,
        Reservation $reservation
    ) {
        $this->user = $user;
        $this->reservation = $reservation;
    }

    public function reserveRoundTrip(Request $request, $returnFlightId)
    {
        try{

        $user = Auth::user();
        $departureFlightId = $request->input('departure_flight_id');
        $reservationId = $request->input('reservation_id');


        $reservation = Reservation::where('id', $reservationId)
                              ->where('user_id', $user->id)
                              ->firstOrFail();

        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';
        $reservation->save();
 if ($reservation->trip_type === 'round_trip') {
        $user->points += 100;
    } else {
        $user->points += 50;
    }

    $user->save();

        return redirect()->route('checkout');
        } catch (Exception $e) {
            Log::error('Error saving into the DB: ' . $e->getMessage(), [
                'exception' => $e
            ]);
        }
    }

     public function reserveDeparture(Request $request, $departureFlightId)
    {
        Log::info('🛬 reserveDeparture hit!', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'departureFlightId' => $departureFlightId,
            'request_data' => $request->all()
        ]);
        try{

        $user = Auth::user();
        $returnFlightId = $request->input('return_flight_id');
        $reservationId = $request->input('reservation_id');


        $reservation = Reservation::where('id', $reservationId)
                              ->where('user_id', $user->id)
                              ->firstOrFail();

        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';

        $reservation->save();
         if ($reservation->trip_type === 'round_trip') {
        $user->points += 100;
    } else {
        $user->points += 50;
    }

    $user->save();
$returnFlight = \App\Models\Flight::findOrFail($returnFlightId);
        $departureFlight = \App\Models\Flight::findOrFail($departureFlightId);
          session()->forget('total_price');
        $totalPrice = $returnFlight->price + $departureFlight->price;
        session()->put('total_price', $totalPrice);

        // Stripe決済ページにリダイレクト（価格をGETパラメータで渡す）
        return redirect()->route('checkout');
        } catch (Exception $e) {
            Log::error('Error saving into the DB: ' . $e->getMessage(), [
                'exception' => $e
            ]);
        }
    }

   public function reserveReturn(Request $request, $returnFlightId)
{
    Log::info('🛬 reserveReturn hit!', [
        'method' => $request->method(),
        'url' => $request->fullUrl(),
        'returnFlightId' => $returnFlightId,
        'request_data' => $request->all()
    ]);

    try {
        $user = Auth::user();
        $departureFlightId = $request->input('departure_flight_id');
        $reservationId = $request->input('reservation_id'); // 追加

       Log::info('🧭 departure_flight_id received from request', [
            'departure_flight_id' => $departureFlightId,
        ]);

        $departureFlight = Flight::find($departureFlightId);
        if (!$departureFlight) {
            Log::error('🚨 departureFlight not found in DB', [
                'departure_flight_id' => $departureFlightId
            ]);
            return redirect()->back()->withErrors('出発便の情報が見つかりませんでした');
        }
        Log::info('departure Flight was found');
        $reservation = Reservation::where('id', $reservationId)
                                  ->where('user_id', $user->id)
                                  ->firstOrFail();
        Log::info('Reservation was found');
        $reservation->return_flight_id = $returnFlightId;
        $reservation->departure_flight_id = $departureFlightId;
        $reservation->trip_type = 'round_trip';
        $reservation->save();
 if ($reservation->trip_type === 'round_trip') {
        $user->points += 100;
    } else {
        $user->points += 50;
    }

    $user->save();
        $departureFlight = \App\Models\Flight::findOrFail($departureFlightId);
        $returnFlight = \App\Models\Flight::findOrFail($returnFlightId);

        $totalPrice = $departureFlight->price + $returnFlight->price;

        // 必要なデータをセッションに保存
        session()->put('total_price', $totalPrice);
        session()->put('reservation_id', $reservationId);
        Log::info('Stripe Execute');
        // StripeリダイレクトコントローラーへPOST
        return redirect()->route('checkout');

    } catch (Exception $e) {
        Log::error('Error in reserveReturn: ' . $e->getMessage(), [
            'exception' => $e
        ]);
        return redirect()->back()->withErrors('フライトの予約中にエラーが発生しました');
    }
}

   public function showCancelOrChangePage()
{
    $user = Auth::user();
//  dd($user);
    $reservation = Reservation::where('user_id', $user->id)
        ->with(['departureFlight', 'returnFlight'])
        ->where('status', 'active')
        ->latest()
        ->first();

    if (!$reservation) {
        return redirect()->route('user.dashboard')->with('error', 'You do not have any reservations.');
    }

    return view('cancel_change', compact('reservation'));
}

public function createReturnReservation(Request $request, $returnFlightId)
{
    Log::info('🛬 createReturnReservation hit!', [
        'method' => $request->method(),
        'url' => $request->fullUrl(),
        'returnFlightId' => $returnFlightId,
        'request_data' => $request->all()
    ]);

    try {
        $user = Auth::user();
        $departureFlightId = $request->input('departure_flight_id');

        $departureFlight = Flight::findOrFail($departureFlightId);
        $returnFlight = Flight::findOrFail($returnFlightId);

        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';
        $randomString = Str::random(6);
        $reservation->reservation_number = strtoupper($randomString);
        $reservation->save();


    if ($reservation->trip_type === 'round_trip') {
        $user->points += 100;
    } else {
        $user->points += 50;
    }

    $user->save();
        Log::info('✅ New Reservation created', ['reservation_id' => $reservation->id]);

        $totalPrice = $departureFlight->price + $returnFlight->price;

        session()->forget(['total_price', 'reservation_id']);
        session()->put('total_price', $totalPrice);
        session()->put('reservation_id', $reservation->id);

        return redirect()->route('checkout');

    } catch (Exception $e) {
        Log::error('❌ Error in createReturnReservation: ' . $e->getMessage(), [
            'exception' => $e
        ]);
        return redirect()->back()->withErrors('フライトの予約中にエラーが発生しました');
    }
}

public function store(Request $request)
{
    $reservation = new Reservation();
    $reservation->user_id = auth()->id();
    $reservation->trip_type = $request->trip_type;
    $reservation->flight_id = $request->flight_id;

    $randomString = Str::random(6);
    $reservation->reservation_number = strtoupper($randomString);
    $reservation->save();


    $user = auth()->user();
    $user->points += $reservation->trip_type === 'round-trip' ? 100 : 50;
    $user->save();

    return redirect()->route('user_dashboard')->with('success', 'Reservation complete. Points added!');
}

}


