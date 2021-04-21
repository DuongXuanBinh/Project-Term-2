<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('business_seats')->unsigned();
            $table->integer('economy_seats')->unsigned();
            $table->integer('total_seats')->unsigned();
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
        Schema::dropIfExists('plane_types');
    }
}
