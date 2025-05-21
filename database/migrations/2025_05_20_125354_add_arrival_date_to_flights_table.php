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
            $table->date('arrival_date')->nullable()->after('departure_date'); // 適切な位置に追加
        });
    }

    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn('arrival_date');
        });
    }
};
