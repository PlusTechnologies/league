<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user');
			$table->string('type');
			$table->string('customer');
			$table->string('transaction');
			$table->string('promo');
			$table->double('subtotal',15, 2);
			$table->double('service_fee',15, 2);
			$table->double('tax',15, 2);
			$table->double('discount',15, 2);
			$table->double('total',15, 2);
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
		Schema::drop('payments');
	}

}
