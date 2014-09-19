<?php

class PlayerController extends BaseController {


  public function createplayer()
  {
  	$user = Auth::user();
  	$playerlist = $user->players;

    $title = 'League Together - Add Player';
    return View::make('pages.signup.createplayer')
    ->withPlayers($playerlist)
    ->with('page_title', $title);
  }

	/**
	 * Display a listing of the resource.
	 * GET /player
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /player/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /player
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = Auth::user();
    $messages = array(
        'firstname.required'      => 'First name is required.',
        'lastname.required'       => 'Last name is required',
        'dob.required'          	=> 'DOB is required',
        'gender.required'       	=> 'Gender is required',
        'year.required'         	=> 'High School Grad Year is required',
        'position.required'      	=> 'Position is required',
        'relation.required'       => 'Relationship is required'
    );

    $validator = Validator::make(Input::all(), Player::$rules, $messages);
    if($validator->passes()){
          $player = new Player;
          $player->firstname    = Input::get('firstname' );
          $player->lastname     = Input::get('lastname' );
          $player->dob       		= date('Y-m-d',strtotime(Input::get('dob' )));
          $player->position     = Input::get('position' );
          $player->gender       = Input::get('gender');
          $player->year       	= Input::get('year');
          $player->avatar       = Input::get('avatar');
          $player->laxid       	= Input::get('laxid');
          $player->save();
					$user->players()->attach($player->id, array('relation' => Input::get('relation')));	
          
          if ($player->id) {
					return Redirect::back();   

          } else {
            $error = $user->errors()->all(':message');
            return Redirect::back()
            ->withInput()
            ->withErrors($error);
          }
      }
      $error = $validator->errors()->all(':message');
      return Redirect::back()
      ->withErrors($error)
      ->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /player/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $user = User::find(1)->with('players')->FirstOrFail();
		// $queries = DB::getQueryLog();
  	// 	return $queries;
		$user = Auth::user();
		//$player = Player::where('id', '=', $id)->with('users')->FirstOrFail();
		$player = User::find($user->id)->players()->wherePivot('player_id', $id)->FirstOrFail();
		$queries = DB::getQueryLog();
		// //return $queries;
		// return $player;
		return $player;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /player/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /player/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$user = Auth::user();
    $messages = array(
        'firstname.required'      => 'First name is required.',
        'lastname.required'       => 'Last name is required',
        'dob.required'          	=> 'DOB is required',
        'gender.required'       	=> 'Gender is required',
        'year.required'         	=> 'High School Grad Year is required',
        'position.required'      	=> 'Position is required',
        'relation.required'       => 'Relationship is required'
    );

    $validator = Validator::make(Input::all(), Player::$rules, $messages);
    if($validator->passes()){
          $player = Player::find($id);
          $player->firstname    = Input::get('firstname' );
          $player->lastname     = Input::get('lastname' );
          $player->dob       		= date('Y-m-d',strtotime(Input::get('dob' )));
          $player->position     = Input::get('position' );
          $player->gender       = Input::get('gender');
          $player->year       	= Input::get('year');
          $player->avatar       = Input::get('avatar');
          $player->laxid       	= Input::get('laxid');
          $player->save();
          DB::table('player_user')
          ->where('player_id', $id)
          ->where('user_id', $user->id)
          ->update(array('relation' => Input::get('relation')));
					//$user->players()->update($player->id, array('relation' => Input::get('relation')));	
          
          if ($player->id) {
            return Redirect::back();
          } else {
            $error = $user->errors()->all(':message');
            return Redirect::back()
            ->withInput()
            ->withErrors($error);
          }
      }
      $error = $validator->errors()->all(':message');
      return Redirect::back()
      ->withErrors($error)
      ->withInput();

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /player/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$player = Player::find($id);
		$player->delete();
		return Redirect::back();
	}



	public function addplayerform()
	{
		return View::make('pages.signup.addplayer');
	}


}