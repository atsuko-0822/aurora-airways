<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'departure_flight_id',
        'return_flight_id',
        'trip_type',
    ];

    // ユーザーとの関係（予約はユーザーに属する）
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 出発便との関係
    public function departureFlight()
    {
        return $this->belongsTo(Flight::class, 'departure_flight_id');
    }

    // 帰りの便との関係（round tripの場合のみ）
    public function returnFlight()
    {
        return $this->belongsTo(Flight::class, 'return_flight_id');
    }
}
