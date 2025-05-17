<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function reserveRoundTrip(Request $request, $returnFlightId)
    {
        $user = Auth::user();
        $departureFlightId = $request->input('departure_flight_id');

        // デバッグで確認（問題があればここで止まる）
        // dd($user, $departureFlightId, $returnFlightId);

        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->departure_flight_id = $departureFlightId;
        $reservation->return_flight_id = $returnFlightId;
        $reservation->trip_type = 'round_trip';
        $reservation->save();

        return redirect()->route('user.dashboard');
    }
}
