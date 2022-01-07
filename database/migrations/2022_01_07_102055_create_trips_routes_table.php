<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->references('id')->on('trips');
            $table->foreignId('route_id')->references('id')->on('routes');
            $table->foreignId('seates_booked')->references('id')->on('seats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_routes');
    }
}
