<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function search(Request $request)
    {
        $query = Flight::query();

        // 検索条件の取得
        $from = $request->input('from');
        $to = $request->input('to');
        $departure_date = $request->input('departure_date');
        $return_date = $request->input('return_date');
        $trip_type = $request->input('trip_type');

        if ($from) {
            $query->where('from', $from);
        }

        if ($to) {
            $query->where('to', $to);
        }

        if ($departure_date) {
            $query->whereDate('departure_date', $departure_date);
        }

        if ($return_date) {
            $query->whereDate('return_date', $return_date);
        }

        if ($trip_type) {
            if ($trip_type === 'one_way') {
                $query->where('trip_category', '0');
            } elseif ($trip_type === 'round_trip') {
                $query->where('trip_category', '1');
            }
        }

        // 最初の2件だけ取得（表示用）
        $flights = $query->take(2)->get();
        // dd($flights);


        // 結果をビューに渡す
        return view('flight_search', compact('flights', 'trip_type'));
    }

    // Show more ボタンで呼ばれる処理（全件表示）
    public function showAllFlights(Request $request)
    {
        $query = Flight::query();

        if ($request->filled('from')) {
            $query->where('from', $request->from);
        }

        if ($request->filled('to')) {
            $query->where('to', $request->to);
        }

        if ($request->filled('departure_date')) {
            $query->whereDate('departure_date', $request->departure_date);
        }

        if ($request->filled('trip_category')) {
            $query->where('trip_category', $request->trip_category);
        }

        $flights = $query->get();

        return view('flight_departure', compact('flights'));
    }

        // $request->validate([
        //     'from' => 'nullable|string|max:255',
        //     'to' => 'nullable|string|max:255',
        //     'departure_date' => 'nullable|date',
        //     'return_date' => 'nullable|date|after_or_equal:departure_date',
        //     'trip_category' => 'nullable|in:one_way,round_trip',
        // ]);

        // $query = Flight::query();

        // if ($request->input('from')) {
        //     $query->where('from', $request->input('from'));
        // }

        // if ($request->input('to')) {
        //     $query->where('to', $request->input('to'));
        // }

        // if ($request->input('departure_date')) {
        //     $query->whereDate('departure_date', $request->input('departure_date'));
        // }

        // if ($request->input('trip_category')) {
        //     if ($request->input('trip_category') === 'one_way') {
        //         $query->where('trip_category', '0');
        //     } elseif ($request->input('trip_category') === 'round_trip') {
        //         $query->where('trip_category', '1');
        //     }
        // }

        // $flights = $query->get();
        // $flights = Flight::all();

        // return view('flight_departure', compact('flights'));


    public function showReturnFlights(Request $request)
{
    $departureFlightId = $request->query('id');

    $departureFlight = Flight::find($departureFlightId);
    $returnFlights = Flight::where('from',$departureFlight->to)
        ->where('to', $departureFlight->from)
        ->whereDate('departure_date','>',$departureFlight->departure_date)
        ->orderBy('departure_date')
        ->get();

    return view('flight_return', [
        'departingFlight' => $departureFlight,
        'returnFlights' => $returnFlights,
    ]);
}

public function selectDepartureFlight(Request $request, $id) //往復予約を保存
{
// $id は出発便のIDです
$request->session()->put('departure_flight_id', $id);
$request->session()->put('trip_type', $request->input('trip_type')); // 'one_way' or 'round_trip'

if ($request->input('trip_type') === 'one_way') {
    return redirect()->route('flight.reserve.oneway');
} else {
    return redirect()->route('flight.selectReturn', ['id' => $id]);
}
}

public function reserveRoundTrip(Request $request, $returnFlightId) //片道予約を保存
{
    $user = Auth::user();
    $departureFlightId = $request->session()->get('departure_flight_id');

    $reservation = new Reservation();
    $reservation->user_id = $user->id;
    $reservation->departure_flight_id = $departureFlightId;
    $reservation->return_flight_id = $returnFlightId;
    $reservation->trip_type = 'round_trip';
    $reservation->save();

    return redirect()->route('user.dashboard');
}

// public function index()
// {
//     $flights = Flight::all();
//     return view('manage_flight', compact('flights'));
// }


// public function index(Request $request)
// {
//     $flights = collect(); // デフォルトは空コレクション

//     if ($request->hasAny(['from', 'to', 'departure_date'])) {
//         $query = Flight::query();

//         if ($request->filled('from')) {
//             $query->where('from', $request->from);
//         }

//         if ($request->filled('to')) {
//             $query->where('to', $request->to);
//         }

//         if ($request->filled('departure_date')) {
//             $query->whereDate('departure_date', $request->departure_date);
//         }

//         $flights = $query->get();
//     }

//     return view('manage_flight', compact('flights'));
// }

public function update(Request $request, $id)
{
    $flight = Flight::findOrFail($id);

    $validated = $request->validate([
        'from' => 'required|string',
        'to' => 'required|string',
        'departure_date' => 'required|date',
        'departure_time' => 'required',
        'arrival_time' => 'required',
        'trip_type' => 'required|string',
        'price' => 'required|numeric',
    ]);

    $flight->update($validated);

   return redirect()->route('admin.flights.index')->with('success', 'Flight updated successfully.');
}

public function toggleVisibility($id)
{
    $flight = Flight::findOrFail($id);

    // 公開・非公開を切り替える例（例: visible カラムがある場合）
    $flight->is_active = !$flight->is_active;
    $flight->save();

    return redirect()->route('admin.flights.index')->with('success', 'Flight visibility toggled successfully.');
}


 }


