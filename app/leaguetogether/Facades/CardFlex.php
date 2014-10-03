<?php namespace leaguetogether\Facades;

use Illuminate\Support\Facades\Facade;

Class CardFlex extends Facade{

	protected static function getFacadeAccessor()
	{
		return 'cardflex';

	}

}