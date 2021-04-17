<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRouteDirects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_directs', function (Blueprint $table) {
            $table->id();
            $table->string('origin_airportid');
            $table->foreign('origin_airportid')->references('id')->on('airports')->onDelete('cascade')->onUpdate('cascade');
            $table->string('arrival_airportid');
            $table->foreign('arrival_airportid')->references('id')->on('airports')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('skymile');
            $table->string('duration');
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
            Schema::dropIfExists('route_directs');
    }
}
