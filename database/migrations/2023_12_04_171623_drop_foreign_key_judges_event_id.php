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
        // Drop the foreign key constraint
        Schema::table('judges', function (Blueprint $table) {
            $table->dropForeign('judges_event_id_foreign');
        });

        // Now, drop the event_id column
        Schema::table('judges', function (Blueprint $table) {
            $table->dropColumn('event_id');
        });
    }

    //pass = Paul009#
    /**
     * Reverse the migrations.s
     */
    public function down(): void
    {
        Schema::table('judges', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained();
        });
    }
};
