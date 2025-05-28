<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class AdminFlightController extends Controller
{
//     public function index(Request $request)
// {
//     $query = Flight::query();

//     if ($request->filled('from')) {
//         $query->where('from', $request->from);
//     }

//     if ($request->filled('to')) {
//         $query->where('to', $request->to);
//     }

//     if ($request->filled('departure_date')) {
//         $query->whereDate('departure_date', $request->departure_date);
//     }

//     $flights = $query->orderBy('departure_date', 'asc')->get();

//     return view('manage_flight', compact('flights'));
// }

public function toggleVisibility($id)
{
    $flight = Flight::findOrFail($id);

    $flight->is_active = !$flight->is_active; // トグルで切り替え
    $flight->save();

    return redirect()->back();

}

public function index(Request $request)
{
    $flights = collect(); // デフォルトは空コレクション

    if ($request->hasAny(['from', 'to', 'departure_date'])) {
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
    }

    return view('manage_flight', compact('flights'));
}

}
