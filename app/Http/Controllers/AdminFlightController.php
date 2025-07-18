<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\Log;

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

public function edit($id)
{
    $flight = Flight::findOrFail($id);
    return view('edit_flight', compact('flight'));
}

// 編集内容を保存
public function update(Request $request, $id)
{
    try{
    Log::info("message: AdminFlightController@update hit!", [
        'method' => $request->method(),
        'url' => $request->fullUrl(),
        'flight_id' => $id,
        'request_data' => $request->all()
    ]);

    $flight = Flight::findOrFail($id);

    // バリデーション
    $request->validate([
        'from' => 'required|string|max:255',
        'to' => 'required|string|max:255',
        'departure_date' => 'required|date',
        'trip_type' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'departure_time' => 'required',
        'arrival_time' => 'required',
    ]);

    // 更新処理
    $flight->update($request->all());

    return redirect()->route('admin.dashboard')->with('success', 'Flight updated successfully');
    } catch (Exception $e) {
        Log::error('Error in update: ' . $e->getMessage(), [
            'exception' => $e
        ]);
        return redirect()->back()->withErrors('フライトの予約中にエラーが発生しました');
    }
}

}
