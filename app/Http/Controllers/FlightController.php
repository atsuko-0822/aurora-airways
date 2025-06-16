<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        $departureFlightId = $request->input('departure_flight_id');
        // return view('flight_departure', compact('flights'));

        return view('flight_departure', [
        'flights' => $flights,
        'isFromSearch' => true,
        'hideSearchForm' => true,
        'tripType' => 'round_trip',
        'returnDate' => $request->query('return_date'),
        'departureFlightId' => $departureFlightId,
    ]);
    }

    public function showReturnFlights(Request $request)
{
    $departureFlightId = $request->input('departure_flight_id');
    // dd($departureFlightId);
    $departureFlight = Flight::find($departureFlightId);
    // dd($departureFlight);

    // dd($departureFlight->from, $departureFlight->to, $departureFlight->departure_date);

    $departureFlightTo = $departureFlight->to;
    $departureFlightFrom = $departureFlight->from;
    $departureFlightDate = $departureFlight->date;

    $returnFlights = Flight::where('from',$departureFlightTo)
        ->where('to', $departureFlightFrom)
        ->whereDate('departure_date','>',$departureFlight->departure_date)
        ->orderBy('departure_date')
        ->get();

    return view('flight_return', [
        'flights' => $returnFlights,
        'departureFlightId' => $departureFlightId,
        'tripType' => 'round_trip',
         'returnDate' => $request->query('return_date'),
    'hideSearchForm' => true, // ← これを追加
    'isFromSearch' => true,   // ← 検索から来たことがわかるように
]);
}
public function selectDepartureFlight(Request $request, $departureFlightId) //往復予約を保存
{
//     dd($departureFlightId);
// $id は出発便のIDです
 $user = Auth::user();
    $returnFlightId = $request->input('return_flight_id');

    $reservationId = $request->input('reservation_id');
$reservation = Reservation::find($reservationId);
if (!$reservation || $reservation->user_id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }
    $reservation->user_id = $user->id;
    $reservation->departure_flight_id = $departureFlightId;
    $reservation->return_flight_id = $returnFlightId;
    $reservation->trip_type = 'round_trip';
    $reservation->save();

    return redirect()->route('user.dashboard');
}

public function reserveRoundTrip(Request $request, $returnFlightId) //片道予約を保存
{
    $user = Auth::user();
    $departureFlightId = $request->session()->get('departure_flight_id');

    $reservationId = $request->input('reservation_id');
$reservation = Reservation::find($reservationId);
if (!$reservation || $reservation->user_id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }
    $reservation->user_id = $user->id;
    $reservation->departure_flight_id = $departureFlightId;
    $reservation->return_flight_id = $returnFlightId;
    $reservation->trip_type = 'round_trip';
    $reservation->save();

    return redirect()->route('user.dashboard');
}

public function index()
{
    $flights = Flight::all();
    return view('manage_flight', compact('flights'));
}


public function update(Request $request, $id)
{
    $flight = Flight::findOrFail($id);

    $validated = $request->validate([
        'from' => 'required|string',
        'to' => 'required|string',
        'departure_date' => 'required|date',
        'return_date' => 'required|date',
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

public function create()
{
    return view('add_flight'); // create.blade.php を表示
}
public function store(Request $request)
{
    $validated = $request->validate([
        'from' => 'required|string',
        'to' => 'required|string',
        'departure_date' => 'required|date',
        'departure_time' => 'required',
        'arrival_time' => 'required',
        'trip_type' => 'required|string',
        'price' => 'required|numeric',
    ]);

    Flight::create($validated);

    return redirect()->route('admin.flights.index')->with('success', 'Flight added successfully.');
}

public function cancel($id)
{
    // 該当の予約を取得
    $reservation = Reservation::findOrFail($id);

    // キャンセル処理（例えばデータを削除）
    $reservation->delete();

    // ダッシュボードなどにリダイレクト
    return redirect()->route('user.dashboard')->with('success', 'フライトをキャンセルしました。');
}

public function showDepartingOptions(Request $request)
{
    $flights = Flight::all(); // デフォルトは空コレクション

    $returnFlightId = $request->query('return_flight_id');
    $reservationId = $request->input('reservation_id');
dd($reservationId);

    return view('flight_departure', compact('flights','returnFlightId','reservationId'));

 }

 public function showReturningOptions(Request $request)
{

    $flights = Flight::all(); // デフォルトは空コレクション

    $departureFlightId = $request->query('departure_flight_id');
    $reservationId = $request->query('reservation_id');

    // dd($reservationId);
    return view('flight_return', compact('flights','departureFlightId','reservationId'));
}


public function changeDeparting(Request $request)
{
    // クエリビルダー
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

    $flights = $query->get();

    return view('flight_departure', [
        'flights' => $flights,
        'returnFlightId' => $request->return_flight_id,
        'reservationId' => $request->reservation_id,
        'isFromSearch' => false, // 🔑予約変更用途
    ]);
}

public function changeReturning(Request $request)
{
    // クエリビルダー
    $query = Flight::query();

    if ($request->filled('from')) {
        $query->where('from', $request->from);
    }

    if ($request->filled('to')) {
        $query->where('to', $request->to);
    }

    if ($request->filled('return_date')) {
        $query->whereDate('return_date', $request->return_date);
    }

    $flights = $query->get();

    return view('flight_return', [
        'flights' => $flights,
        'departureFlightId' => $request->departure_flight_id,
        'reservationId' => $request->reservation_id,
    ]);
}

public function changeSearchDeparting(Request $request)
{
    // クエリビルダー
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

    $flights = $query->get();

    return view('flight_departure', [
        'flights' => $flights,
        'returnFlightId' => $request->input('return_flight_id'),
        'departureFlightId' => $request->input('departure_flight_id'),
        'reservationId' => $request->input('reservation_id'),
    ]);
}

public function changeSearchReturning(Request $request)
{
    // クエリビルダー
    $query = Flight::query();

    if ($request->filled('from')) {
        $query->where('from', $request->from);
    }

    if ($request->filled('to')) {
        $query->where('to', $request->to);
    }

    if ($request->filled('return_date')) {
        $query->whereDate('return_date', $request->return_date);
    }

    $flights = $query->get();

    return view('flight_return', [
        'flights' => $flights,
        'departureFlightId' => $request->input('departure_flight_id'),
        'reservationId' => $request->input('reservation_id'),
    ]);
}
}
