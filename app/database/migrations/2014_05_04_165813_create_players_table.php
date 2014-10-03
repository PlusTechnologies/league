<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstname');
      $table->string('lastname');
      $table->string('avatar');
			$table->date('dob');
			$table->string('position');
			$table->string('gender');
			$table->string('year');
			$table->string('laxid');
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
		Schema::drop('players');
	}

}
