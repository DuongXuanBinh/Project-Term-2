<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTicketPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('flight_id');
            $table->unsignedInteger('class_id');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_prices', function (Blueprint $table) {
            Schema::dropIfExists('ticket_prices');
        });
    }
}
