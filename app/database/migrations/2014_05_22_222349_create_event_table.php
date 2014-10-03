<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('type');
			$table->text('description');
			$table->string('location');
			$table->double('fee');
			$table->double('group_fee');
			$table->date('start');
			$table->date('end');
			$table->date('open');
			$table->date('close');
			$table->integer('club_id')->unsigned()->index();
			$table->foreign('club_id')->references('id')->on('clubs');
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
		Schema::drop('events');
	}

}
