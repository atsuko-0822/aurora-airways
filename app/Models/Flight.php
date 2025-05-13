<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'from',
        'to',
        'departure_date',
        'departure_time',
        'arrival_time',
        'trip_type',
        'price',
    ];
}
