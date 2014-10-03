<?php

class TeamController extends BaseController {

	public function __construct()
    {
        $this->beforeFilter('club', ['except'=>'publico']);
        $this->beforeFilter('csrf', ['on' => array('create','edit')]);
    }


	/**
	 * Display a listing of the resource.
	 * GET /team
	 *
	 * @return Response
	 */
	public function index($id)
	{
		
		$user= Auth::user();
		$club= Club::find($id)->with('programs')->firstOrfail();
		$seasons = Seasons::all();
		$title = 'League Together - '.$club->name.' Teams';
		return View::make('pages.user.club.team.default')
		->with('page_title', $title)
		->with('club', $club)
		->with('seasons', $seasons)
		->withUser($user);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /team/create
	 *
	 * @return Response
	 */
	public function create($id)
	{

		setlocale(LC_MONETARY,"en_US");
		$user= Auth::user();
		$club= Club::find($id);
		$seasons = Seasons::all();
		$title = 'League Together - '.$club->name.' Teams';
		return View::make('pages.user.club.team.create')
		->with('page_title', $title)
		->with('club', $club)
		->with('seasons', $seasons)
		->withUser($user);		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /team
	 *
	 * @return Response
	 */
	public function store($club)
	{
		//get current club
		$user = Auth::user();
		$messages = array(
			'name.required'									=> 'Name is required.',
			'due.required'									=> 'Dues amount is required.',
			'club_id.required'							=> 'Club ID is required.',
			'season_id.required'						=> 'Season ID is required.',
			'program_id.required'						=> 'Program ID is required.',
			'early_dues.required'						=> 'Early bird dues required.',
			'early_dues_deadline.required'	=> 'Deadline is required'
		);

		$otherdata = array('user_id'=>$user->id,'club_id'=>$id);
		$validator = Validator::make(array_merge(Input::all(),$otherdata), Program::$rules, $messages);

		return array_merge(Input::all(),$otherdata);
				
		if($validator->passes()){
			$program = new Program;
			$program->name    		= Input::get('name' );
			$program->club_id    	= $id;
			$program->user_id    	= $user->id;
			$program->description = Input::get('description' );
			$program->save();

			if ($program->id) {
				$success[] = array('Program Sucessfully added');
				return Redirect::back()->withErrors($success);   

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
	 * GET /team/{id}
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
	 * GET /team/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /team/{id}
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
	 * DELETE /team/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}