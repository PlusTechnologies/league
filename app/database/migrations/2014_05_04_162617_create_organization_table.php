<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizations', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('sport');
            $table->string('description');
            $table->string('add1');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
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
		Schema::drop('organizations');
	}

}
