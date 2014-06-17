<?php namespace leaguetogether\Paymentgateway;

use Illuminate\Support\ServiceProvider;

class CardFlexServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind('cardflex','leaguetogether\Paymentgateway\CardFlex');
	}

}
