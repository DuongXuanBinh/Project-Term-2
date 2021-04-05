<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFlights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('origin');
            $table->unsignedInteger('origin_airportid');
            $table->unsignedInteger('arrival_airportid');
            $table->dateTime('departure_time');
            $table->unsignedInteger('statusID');
            $table->unsignedInteger('planeID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('flights');
    }
}
