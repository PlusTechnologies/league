<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('communications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('club_id')->unsigned()->index();
			$table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
			$table->integer('recepient');
			$table->string('message');
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
		Schema::drop('communications');
	}

}
