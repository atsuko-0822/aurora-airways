<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class AdminFlightController extends Controller
{
    public function index(Request $request)
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

    $flights = $query->orderBy('departure_date', 'asc')->get();

    return view('admin.flights.index', compact('flights'));
}

}
