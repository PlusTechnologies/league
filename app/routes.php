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
Route::get('login', 							array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::post('user/login',                  		'UserController@do_login');
Route::get( 'user/confirm/{code}',         	  	'UserController@confirm');
Route::get( 'user/forgot_password',			  	'UserController@forgot_password');
Route::post('user/forgot_password',			  	'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 	  	'UserController@reset_password');
Route::post('user/reset_password',         	  	'UserController@do_reset_password');
Route::get( 'logout',                         	'UserController@logout');

Route::get('dashboard', 				'DashboardController@show');


