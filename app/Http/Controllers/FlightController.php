<?php

namespace App\Http\Controllers;
use App\Models\Flight;

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
    public function showAll(Request $request)
    {
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
        $flights = Flight::all();
        // dd($flights);

        return view('flight_departure', compact('flights'));
    }

//     public function showReturnFlights(Flight $flight)
// {
    // 復路便の条件：出発便と逆のfrom/toで、日付が後
//     $returnFlights = Flight::where('from', $flight->to)
//         ->where('to', $flight->from)
//         ->whereDate('departure_date', '>', $flight->departure_date)
//         ->orderBy('departure_date')
//         ->get();

//     return view('flight_return', [
//         'departingFlight' => $flight,
//         'returnFlights' => $returnFlights,
//     ]);
// }
 }
