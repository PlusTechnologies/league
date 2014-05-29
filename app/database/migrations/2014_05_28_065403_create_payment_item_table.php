<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_item', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('payment')->unsigned()->index();
			$table->foreign('payment')->references('id')->on('payments')->onDelete('cascade');
			$table->integer('item');
			$table->integer('type');
			$table->double('price');
			$table->double('fee');
			$table->double('discount');
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
		Schema::drop('payment_item');
	}

}
