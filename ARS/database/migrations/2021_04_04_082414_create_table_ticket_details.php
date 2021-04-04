<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTicketDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('flight_id');
            $table->string('seat_location');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('pasasengerId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_details', function (Blueprint $table) {
            Schema::dropIfExists('ticket_details');
        });
    }
}
