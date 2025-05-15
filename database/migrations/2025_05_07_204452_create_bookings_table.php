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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('host_username');
            $table->string('trip_id');
            $table->string('bus_id');
            $table->string('passenger_id')->nullable();
            $table->string('passenger_name');
            $table->string('booked_seat_ids');
            $table->string('seats_booked');
            $table->string('booking_status')->default('pending');
            $table->decimal('fare', 8, 2);
            $table->string('booked_by');
            $table->string('payment_mode');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('mobile_no');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
