<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\User;

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
        return redirect()->route('user.dashboard');
        } catch (Exception $e) {
            Log::error('Google login redirect failed: ' . $e->getMessage(), [
                'exception' => $e
            ]);
        }
    }

   public function showCancelOrChangePage()
{
    $user = Auth::user();

    $reservation = Reservation::where('user_id', $user->id)
        ->with(['departureFlight', 'returnFlight'])
        ->latest()
        ->first();

    if (!$reservation) {
        return redirect()->route('user.dashboard')->with('error', 'You do not have any reservations.');
    }

    return view('cancel_change', compact('reservation'));
}
}
