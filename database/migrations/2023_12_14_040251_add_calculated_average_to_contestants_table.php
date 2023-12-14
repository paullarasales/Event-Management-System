<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contestants', function (Blueprint $table) {
            $table->decimal('calculated_average', 5, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('contestants', function (Blueprint $table) {
            $table->dropColumn('calculated_average');
        });
    }
};
