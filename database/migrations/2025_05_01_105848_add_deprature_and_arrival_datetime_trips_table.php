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
        Schema::table('trips', function (Blueprint $table) {
            $table -> dateTime('deprature_datetime')->nullable()->after('from');
            $table -> dateTime('arrival_datetime')->nullable()->after('to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table -> dropColumn('deprature_datetime');
            $table -> dropColumn('arrival_datetime');
        });
    }
};
