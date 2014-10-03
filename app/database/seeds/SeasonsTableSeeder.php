<?php


class SeasonsTableSeeder extends Seeder {

	public function run()
	{
		$years = 2014;
		foreach(range(1, 15) as $index)
		{	
			Seasons::create(
				array('name'=>$years,'description'=> 'Season'.' '. $years)
			);
			$years = $years + 1;
		}
	}

}