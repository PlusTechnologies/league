<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@getIndex'));

// Confide routes
Route::get('signup', 							array('as' => 'signup', 'uses' => 'UserController@create_user'));
Route::get('signup/welcome', 					array('as' => 'signup.welcome', 'uses' => 'UserController@welcome'));
Route::get('signup/family', 					array('as' => 'signup.family', 'uses' => 'UserController@family'));
Route::get('signup/player', 					array('as' => 'signup.player', 'uses' => 'UserController@player'));
Route::get('signup/organization', 				array('as' => 'signup.organization', 'uses' => 'UserController@organization'));
Route::get( 'logout',							array('as' => 'logout', 'uses' => 'UserController@logout'));
Route::get('login', 							array('as' => 'login', 'uses' => 'UserController@login'));

Route::get( 'user/confirm/{code}',         	  	'UserController@confirm');
Route::get( 'user/forgot_password',			  	'UserController@forgot_password');
Route::get( 'user/reset_password/{token}', 	  	'UserController@reset_password');
Route::post('user/reset_password',         	  	'UserController@do_reset_password');
Route::post('account',                        	'UserController@store');
Route::post('user/login',                  		'UserController@do_login');
Route::post('user/forgot_password',			  	'UserController@do_forgot_password');


// Dasboard routes
Route::get('dashboard', 						array('before' => 'auth','as' => 'dashboard', 'uses' => 'DashboardController@show'));
Route::get('elements', 							array('before' => 'auth','as' => 'elements', 'uses' => 'DashboardController@element'));

Route::group(array('before' =>'auth', 'prefix' => 'dashboard'), function() {
	Route::resource('organization', 'OrganizationController');
	Route::resource('organization.event', 'EventoController');
	Route::resource('organization.discount', 'DiscountController');
	Route::resource('organization.teams', 'TeamController');
	Route::resource('organization.communication', 'CommunicationController');
	Route::get( 'organization.accounting', array('as' => 'accounting', 'uses' => 'AccountingController@index'));
	Route::get( 'organization.roster', array('as' => 'roster', 'uses' => 'RosterController@index'));

	Route::get( 'player', array('as' => 'player', 'uses' => 'PlayerController@index'));

});

Route::get( 'public/event/{id}',         	  	'EventoController@publico');

//Payment Process routes
Route::get('cart',         	  					'PaymentController@index');
Route::get('cart/remove/{id}',         	  		'PaymentController@removefromcart');
Route::post('cart/add',         	  			'PaymentController@addtocart');

Route::get( 'checkout',         	  			array('before' => 'auth','as' => 'checkout', 'uses' => 'PaymentController@create'));
Route::get( 'checkout/success',         	  	array('before' => 'auth','as' => 'checkout.success', 'uses' => 'PaymentController@success'));
Route::post( 'checkout/store',         	  		array('before' => 'auth','as' => 'checkout.store', 'uses' => 'PaymentController@store'));
Route::post( 'checkout/validate',         	  	array('before' => 'auth','as' => 'checkout.validate', 'uses' => 'PaymentController@validate'));
Route::post( 'checkout/discount',         	  	array('before' => 'auth','as' => 'checkout.discount', 'uses' => 'DiscountController@validate'));

Route::get('api/graph/discount', 		'GraphController@discount');

//Route::get( '/email/receipt/{id}',         		array('before' => 'auth','as' => 'email.receipt', 'uses' => 'PaymentController@receipt'));


Route::get('/email/receipt/{id}', function()
{
    return View::make('emails.receipt.default');
});

Route::get('/welcome', function()
{
	/*add the proper view*/
    return View::make('emails.receipt.default');
});

Route::get('/password', function()
{
	/*add the proper view*/
    return View::make('emails.receipt.default');
});

Route::get('/password/reset', function()
{
	/*add the proper view*/
    return View::make('emails.receipt.default');
});

Route::get('/php/info', function()
{
	/*add the proper view*/
    return View::make('php.info');
});

//** smart link macro **//
HTML::macro('smart_link', function($route) 
{	
    if(Route::is($route) OR Request::is($route))
    { $active = "active";} else { $active = '';}
    return $active;
});

	




	



