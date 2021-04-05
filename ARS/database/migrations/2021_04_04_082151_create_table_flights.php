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
            $table->unsignedInteger('origin_airportid');
            $table->unsignedInteger('arrival_airportid');
            $table->dateTime('departure_time');
            $table->unsignedInteger('statusid');
            $table->unsignedInteger('planeid');
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
