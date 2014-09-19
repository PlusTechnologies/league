<?php

class DashboardController extends BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
	
		$user =Auth::user();
		// $title = 'League Together - Dashboard';
		// return View::make('pages.user.dashboard')
		// 	->with('page_title', $title)
		// 	->withUser($user);
		if($user->type <> 2 ){
			return Redirect::action('ClubController@index');
		}

		return Redirect::action('AccountController@index');
	}

	public function element()
	{
		$user =Auth::user();
		$clublist = $user->clubs;
		//return $clublist;
		$title = 'League Together - Dashboard';
		return View::make('pages.user.elements')
			->with('page_title', $title)
			->with('clubs', $clublist)
			->withUser($user);
	}



}