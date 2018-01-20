<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('user_zipdata', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('user_zipdata', function(Blueprint $table) {
			$table->foreign('zipdata_id')->references('id')->on('zipdatas')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('user_zipdata', function(Blueprint $table) {
			$table->dropForeign('user_zipdata_user_id_foreign');
		});
		Schema::table('user_zipdata', function(Blueprint $table) {
			$table->dropForeign('user_zipdata_zipdata_id_foreign');
		});
	}
}