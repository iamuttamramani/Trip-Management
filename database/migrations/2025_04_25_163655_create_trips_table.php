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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('bus_id');
            $table->string('from');
            $table->string('deprature_date');
            $table->string('deprature_time');
            $table->string('to');
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->string('booked_seats')->default(0);
            $table->string('total_seats');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
