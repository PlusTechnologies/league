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

Route::get('/', 										array('as' =>'home', 									'uses' => 'HomeController@getIndex'));
Route::get('signup', 								array('as' => 'signup', 							'uses' => 'UsersController@welcome'));
Route::get('login', 								array('as' => 'login', 								'uses' => 'UsersController@getLogin'));
Route::get('logout', 								array('as' => 'logout', 							'uses' => 'UsersController@getLogout'));
Route::get('signup/family', 				array('as' => 'signup.family', 				'uses' => 'UsersController@family'));
Route::get('signup/family/player', 	array('before' => 'auth', 'as' => 'signup.family.player', 'uses' 	=> 'PlayerController@createplayer'));
Route::get('signup/family/follow', 	array('before' => 'auth', 'as' => 'signup.family.follow', 'uses' 		=> 'ClubController@follow'));
Route::get('signup/player', 				array('as' => 'signup.player', 				'uses' => 'UsersController@player'));
Route::get('signup/club', 	array('as' => 'signup.club', 	'uses' => 'UsersController@club'));
Route::get('signup/club/create', 	array('as' => 'signup.club.create', 	'uses' => 'ClubController@createclub'));



// Confide RESTful route
Route::get('users/confirm/{code}', 'UsersController@getConfirm');
Route::get('users/reset_password/{token}', 'UsersController@getReset');
Route::get('users/reset_password', 'UsersController@postReset');
Route::controller( 'users', 'UsersController');
Route::resource( 'players', 'PlayerController');
//Custome Confide RESTfull
Route::post('users',                      'UsersController@create');
Route::post('signup/family/player', 			'PlayerController@store');
Route::post('signup/family/follow', 			'ClubController@followsave');
Route::delete('signup/family/follow/{id}', 		'ClubController@unfollow');

// Dasboard routes
Route::get('dashboard', 		array('before' => 'auth','as' => 'dashboard', 'uses' => 'DashboardController@show'));
Route::get('elements', 			array('before' => 'auth','as' => 'elements', 'uses' => 'DashboardController@element'));

Route::group(								array('before' =>'auth', 'prefix' => 'dashboard'), function() {
	Route::resource('club', 'ClubController');
	Route::resource('club.event', 'EventoController');
	Route::resource('club.discount', 'DiscountController');
	Route::resource('club.teams', 'TeamController');
	Route::resource('club.communication', 'CommunicationController');
	Route::get( 'club.accounting', 	array('as' => 'accounting', 'uses' => 'AccountingController@index'));
	Route::get( 'club.roster', 			array('as' => 'roster', 'uses' => 'RosterController@index'));
	Route::get( 'player', 									array('as' => 'player', 'uses' => 'PlayerController@index'));

});

Route::get( 'public/event/{id}','EventoController@publico');

//Payment Process routes
Route::get('cart',							'PaymentController@index');
Route::get('cart/remove/{id}',	'PaymentController@removefromcart');
Route::post('cart/add',					'PaymentController@addtocart');

Route::get('cart/select',					array('before' => 'auth','as' => 'checkout.select', 'uses' => 'PaymentController@selectplayer'));
Route::post('cart/select/{id}',		array('before' => 'auth','as' => 'checkout.select.addplayer', 'uses' => 'PaymentController@addplayertocart'));
Route::delete('cart/select/{id}', array('before' => 'auth','as' => 'checkout.select.removeplayer', 'uses' => 'PaymentController@removeplayertocart'));

Route::get( 'checkout',         	 array('before' => 'auth','as' => 'checkout', 					'uses' => 'PaymentController@create'));
Route::get( 'checkout/success',    array('before' => 'auth','as' => 'checkout.success', 	'uses' => 'PaymentController@success'));
Route::post( 'checkout/store',     array('before' => 'auth','as' => 'checkout.store', 		'uses' => 'PaymentController@store'));
Route::post( 'checkout/validate',  array('before' => 'auth','as' => 'checkout.validate', 	'uses' => 'PaymentController@validate'));
Route::post( 'checkout/discount',  array('before' => 'auth','as' => 'checkout.discount', 	'uses' => 'DiscountController@validate'));

//API
Route::get('api/graph/discount', 		'GraphController@discount');
Route::post('api/image/upload', 		'ImageController@upload');
Route::post('api/image/crop', 			'ImageController@crop');
Route::get('api/player/{id}', 			'PlayerController@show');
Route::get('api/club/{id}', 				'ClubController@clubshow');

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

/*
*Get the profile page route
*/
Route::get( 'pages/user/profile/profile','UsersController@getUserProfile');
/*
* Edit profile route
*/
Route::get('edit',[
	'as' => 'edit_profile',
	'uses' => 'UsersController@editUserProfile'
	]);
/*
*Update the profile information
*/
Route::POST( 'pages/user/profile/edit','UsersController@updateProfile');
