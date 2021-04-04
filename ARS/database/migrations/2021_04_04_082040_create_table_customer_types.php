<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCustomerTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age')->unsigned();
            $table->double('fare_diff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_types', function (Blueprint $table) {
            Schema::dropIfExists('customer_types');
        });
    }
}
