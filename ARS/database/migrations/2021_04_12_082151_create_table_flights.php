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
            $table->string('id')->primary();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('route_directs')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->unsignedBigInteger('statusid');
            $table->foreign('statusid')->references('id')->on('flight_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('planeid');
            $table->foreign('planeid')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
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
