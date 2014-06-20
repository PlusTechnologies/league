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
Route::get('/', array('as'=>'home', 'uses'=>'HomeController@getIndex'));

// Confide routes
Route::get('signup', 							array('as' => 'signup', 'uses' => 'UserController@create_user'));
Route::post('account',                        	'UserController@store');
Route::get('login', 							array('as' => 'login', 'uses' => 'UserController@login'));
Route::post('user/login',                  		'UserController@do_login');
Route::get( 'user/confirm/{code}',         	  	'UserController@confirm');
Route::get( 'user/forgot_password',			  	'UserController@forgot_password');
Route::post('user/forgot_password',			  	'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 	  	'UserController@reset_password');
Route::post('user/reset_password',         	  	'UserController@do_reset_password');
Route::get( 'logout',							array('as' => 'logout', 'uses' => 'UserController@logout'));

// Dasboard routes
Route::get('dashboard', 						array('before' => 'auth','as' => 'dashboard', 'uses' => 'DashboardController@show'));
Route::get('elements', 							array('before' => 'auth','as' => 'elements', 'uses' => 'DashboardController@element'));

Route::group(array('before' => 'auth', 'prefix' => 'dashboard', ), function() {
	Route::resource('organization', 'OrganizationController');
	Route::resource('organization.event', 'EventoController');
});

Route::get( 'public/event/{id}',         	  	'EventoController@publico');

//Payment Process routes
Route::get('cart',         	  					'PaymentController@index');
Route::get('cart/remove/{id}',         	  		'PaymentController@removefromcart');
Route::post('cart/add',         	  			'PaymentController@addtocart');

Route::get( 'checkout',         	  			array('before' => 'auth','as' => 'checkout', 'uses' => 'PaymentController@create'));
Route::get( 'checkout/success',         	  	array('before' => 'auth','as' => 'checkout.success', 'uses' => 'PaymentController@success'));
Route::post( 'checkout/store',         	  		array('before' => 'auth','as' => 'checkout.store', 'uses' => 'PaymentController@store'));


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


	




	



