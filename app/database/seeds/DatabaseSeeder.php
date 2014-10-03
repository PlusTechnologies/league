<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('SeasonsTableSeeder');
     $this->command->info('Seasons table seeded!');
	}

}
