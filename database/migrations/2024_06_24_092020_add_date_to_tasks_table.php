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
        Schema::table('tasks', function (Blueprint $table) {
            $table->date("begin_at")->nullable();
            $table->time("hour_begin_at")->nullable();
            $table->date("finished_at")->nullable();
            $table->time('hour_finished_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn("begin_at");
            $table->dropColumn("hour_begin_at");
            $table->dropColumn("finished_at");
            $table->dropColumn("hour_finished_at");
        });
    }
};
