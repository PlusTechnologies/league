<?php

use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('customer_id')->unique()->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->integer('type');
            $table->integer('plan');
            $table->string('avatar');
            $table->string('facebook');
            $table->string('twitter');
            $table->boolean('first_login')->default(false);
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }
}
