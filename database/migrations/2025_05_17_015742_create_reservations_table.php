<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('departure_flight_id');
            $table->foreignId('return_flight_id')->nullable(); // 片道のときは null
            $table->enum('trip_type', ['one_way', 'round_trip']);
            $table->timestamps();
        });
}
};

