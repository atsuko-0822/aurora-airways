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
    Schema::table('flights', function (Blueprint $table) {
        $table->time('departure_time')->change();
        $table->time('arrival_time')->change();
    });
}

public function down(): void
{
    Schema::table('flights', function (Blueprint $table) {
        $table->dateTime('departure_time')->change();
        $table->dateTime('arrival_time')->change();
    });
}

};
