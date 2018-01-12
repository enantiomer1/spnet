<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipdata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip_code', 5);
            $table->string('state_abbreviation', 2);
            $table->string('latitude', 10, 6);
            $table->string('longitude', 10, 5);
            $table->string('city', 27)->nullable();
            $table->string('state', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zipdata');
    }
}
