<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserZipdataTable extends Migration {

	public function up()
	{
		Schema::create('user_zipdata', function(Blueprint $table) {
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('zipdata_id')->unsigned()->nullable();
			$table->primary(['user_id', 'zipdata_id']);
		});
	}

	public function down()
	{
		Schema::drop('user_zipdata');
	}
}