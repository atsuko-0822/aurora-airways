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
            $query->where('trip_type', $trip_type);
        }

        // 最初の2件だけ取得（表示用）
        $flights = $query->take(2)->get();

        // 結果をビューに渡す
        return view('flight_search', compact('flights', 'trip_type'));
    }

    // Show more ボタンで呼ばれる処理（全件表示）
    public function showAll(Request $request)
    {
        $query = Flight::query();

        if ($request->input('from')) {
            $query->where('from', $request->input('from'));
        }

        if ($request->input('to')) {
            $query->where('to', $request->input('to'));
        }

        if ($request->input('departure_date')) {
            $query->whereDate('departure_date', $request->input('departure_date'));
        }

        if ($request->input('trip_type')) {
            $query->where('trip_type', $request->input('trip_type'));
        }

        $flights = $query->get();

        return view('flight_departure', compact('flights'));
    }
}
