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
        Schema::table('route_directs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('origin_airportid');
            $table->unsignedInteger('arrival_airportid');
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
        Schema::table('route_directs', function (Blueprint $table) {
            Schema::dropIfExists('route_directs');
        });
    }
}
