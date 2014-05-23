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
			$table->string('descriptions');
			$table->string('location');
			$table->double('fee');
			$table->double('group_fee');
			$table->date('start');
			$table->date('end');
			$table->date('open');
			$table->date('close');
			$table->integer('organization_id')->unsigned()->index();
			$table->foreign('organization_id')->references('id')->on('organizations');
			
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
		Schema::drop('event');
	}

}
