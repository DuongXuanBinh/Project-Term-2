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
            $table->string('transit_airportid')->nullable(true);
            $table->string('arrival_airportid');
            $table->integer('skymile');
            $table->timestamp('duration');
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
