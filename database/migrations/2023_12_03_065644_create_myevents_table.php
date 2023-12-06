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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->dateTime('start_date');
            $table->string('location');
            $table->timestamps();
        });


        Schema::table('judges', function (Blueprint $table) {
            $table->foreignId('event_id')->nullable()->constrained();
        });

        Schema::table('contestants', function (Blueprint $table) {
            $table->foreignId('event_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
