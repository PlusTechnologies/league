<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /account
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$title = 'League Together - Player';
   		return View::make('pages.user.account.default')
    	->with('page_title', $title)
     	->with('user', $user);
	}

	/**
	 * Display a listing of the resource.
	 * GET /account/payments
	 *
	 * @return Response
	 */
	public function payments()
	{
		$user = Auth::user();
		$title = 'League Together - Payments';
   		return View::make('pages.user.account.payments')
    	->with('page_title', $title)
     	->with('user', $user);
	}

	/**
	 * Display a listing of the resource.
	 * GET /account/payments
	 *
	 * @return Response
	 */
	public function players()
	{
		$user = Auth::user();
  		$playerlist = $user->players;
		$title = 'League Together - Player';
   		return View::make('pages.user.account.players')
    	->with('page_title', $title)
    	->withPlayers($playerlist)
     	->with('user', $user);
	}
	/**
	 * Display a listing of the resource.
	 * GET /account/payments
	 *
	 * @return Response
	 */
	public function clubs()
	{
		$user = Auth::user();
		$club = Club::all();
		$title = 'League Together - Follow';
		return View::make('pages.user.account.clubs')
		->withClubs($club)
		->withFollowers($user->followers)
		->with('user', $user)
		->with('page_title', $title);

	}
	/**
	 * Show the form for creating a new resource.
	 * GET /account/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /account
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /account/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = Auth::user();
		$title = 'League Together - Player';
    	return View::make('pages.user.account.settings')
    	->with('page_title', $title)
    	->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}