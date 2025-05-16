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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('from'); // 出発地（例: Tokyo）
            $table->string('to');   // 到着地（例: Vancouver）
            $table->date('departure_date'); // 出発日
            $table->dateTime('departure_time'); // 出発時刻
            $table->dateTime('arrival_time');   // 到着時刻
            // $table->enum('trip_type', ['one_way', 'round_trip'])->default('one_way');
            $table->decimal('price', 8, 2);
            $table->enum('trip_category', ['1', '0']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
