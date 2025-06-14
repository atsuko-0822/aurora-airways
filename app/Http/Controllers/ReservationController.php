<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;

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

        // デバッグで確認（問題があればここで止まる）
        // dd($user, $departureFlightId, $returnFlightId);

        $reservation = Reservation::where('id', $reservationId)
                              ->where('user_id', $user->id)
                              ->firstOrFail();

        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';
        $reservation->save();

        // dd($reservation);
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

        // デバッグで確認（問題があればここで止まる）
        // dd($user, $departureFlightId, $returnFlightId);

        $reservation = Reservation::where('id', $reservationId)
                              ->where('user_id', $user->id)
                              ->firstOrFail();

        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';
        // dd($reservation);
        $reservation->save();
$returnFlight = \App\Models\Flight::findOrFail($returnFlightId);
        $departureFlight = \App\Models\Flight::findOrFail($departureFlightId);
          session()->forget('total_price');
        $totalPrice = $returnFlight->price + $departureFlight->price;
        session()->put('total_price', $totalPrice);
            // dd($totalPrice);
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

        $departureFlight = \App\Models\Flight::find($departureFlightId);
        if (!$departureFlight) {
            Log::error('🚨 departureFlight not found in DB', [
                'departure_flight_id' => $departureFlightId
            ]);
            return redirect()->back()->withErrors('出発便の情報が見つかりませんでした');
        }

        $reservation = Reservation::where('id', $reservationId)
                                  ->where('user_id', $user->id)
                                  ->firstOrFail();

        $reservation->return_flight_id = $returnFlightId;
        $reservation->departure_flight_id = $departureFlightId;
        $reservation->trip_type = 'round_trip';
        $reservation->save();

        $departureFlight = \App\Models\Flight::findOrFail($departureFlightId);
        $returnFlight = \App\Models\Flight::findOrFail($returnFlightId);

        $totalPrice = $departureFlight->price + $returnFlight->price;

        // 必要なデータをセッションに保存
        session()->put('total_price', $totalPrice);
        session()->put('reservation_id', $reservationId);

        // StripeリダイレクトコントローラーへPOST
        return redirect()->route('stripe.payment');

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
        ->latest()
        ->first();
    // dd($reservation);
    if (!$reservation) {
        return redirect()->route('user.dashboard')->with('error', 'You do not have any reservations.');
    }

    return view('cancel_change', compact('reservation'));
}
}


