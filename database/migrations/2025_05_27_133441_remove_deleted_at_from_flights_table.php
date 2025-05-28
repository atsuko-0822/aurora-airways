<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDeletedAtFromFlightsTable extends Migration
{
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropSoftDeletes(); // ← deleted_at を削除
        });
    }

    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->softDeletes(); // ← rollback 時に復元
        });
    }
}
