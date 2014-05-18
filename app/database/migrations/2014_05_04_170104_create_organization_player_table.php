<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationPlayerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization_player', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('organization_id')->unsigned()->index();
			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
			$table->integer('player_id')->unsigned()->index();
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
		Schema::drop('organization_player');
	}

}
