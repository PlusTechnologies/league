<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user')->unsigned()->index();
			$table->foreign('user')->references('id')->on('users')->onDelete('cascade');
			$table->integer('event')->unsigned()->index();
			$table->foreign('event')->references('id')->on('events')->onDelete('cascade');
			$table->integer('payment')->unsigned()->index();
			$table->foreign('payment')->references('id')->on('payments')->onDelete('cascade');
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
		Schema::drop('event_user');
	}

}
