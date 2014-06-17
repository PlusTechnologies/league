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
		$organizationlist = $user->organizations;
		//return $organizationlist;
		$title = 'League Together - Dashboard';
		return View::make('pages.user.dashboard')
			->with('page_title', $title)
			->with('organizations', $organizationlist)
			->withUser($user);
	}

	public function element()
	{
		$user =Auth::user();
		$organizationlist = $user->organizations;
		//return $organizationlist;
		$title = 'League Together - Dashboard';
		return View::make('pages.user.elements')
			->with('page_title', $title)
			->with('organizations', $organizationlist)
			->withUser($user);
	}



}