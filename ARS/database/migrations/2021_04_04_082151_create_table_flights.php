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
            $table->string('origin_airportid');
            $table->string('arrival_airportid');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
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