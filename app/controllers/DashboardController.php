<?php

class DashboardController extends \BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		dd('dashboard');
		exit();
		try{
			$user = User::whereId($id)->firstOrFail();
			if($user->type == 1){
				$user = User::whereId($id)->with('organizations')->firstOrFail();
			}else{
				$user = User::whereId($id)->with('player')->firstOrFail();
			}
		}
		catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){

			return Redirect::route('home');

		}
		
		$title = 'League Together - Dashboard';
		return View::make('pages.dashboard')
			->with('page_title', $title)
			->withUser($user);
	}


}