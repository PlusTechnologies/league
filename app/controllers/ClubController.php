<?php

class ClubController extends BaseController {


	 /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('club', ['except' => array('index','create','store')]);
        $this->beforeFilter('csrf', ['on' => array('create','edit','store')]);
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user =Auth::user();
		$clublist = $user->clubs;
		//return $clublist;
		$title = 'League Together - Dashboard';
		return View::make('pages.user.club.dashboard')
			->with('page_title', $title)
			->with('clubs', $clublist)
			->withUser($user);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user =Auth::user();
		$title = 'League Together - Club';
		return View::make('pages.user.club.create')
			->with('page_title', $title)
			->withUser($user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$messages = array(
        'name.required'     		=> 'Club name is required.',
        'sport.required'     		=> 'Please select a sport',
        'add1.required'       		=> 'Street address is required',
        'city.required'       		=> 'City is required',
        'state.required'       		=> 'State is required',
        'zip.required'       		=> 'Zipcode is required',
        'description.required'      => 'Description is required',
        'logo.required'       		=> 'Logo is required',
        'phone.required'       		=> 'Contact phone is required',
        'email.required'       		=> 'Contact email is required',
        );

        $validator= Validator::make(Input::all(), Club::$rules, $messages);

        if($validator->passes()){

    		$club = new Club;
            $club->name      		= Input::get( 'name' );
            $club->sport     		= Input::get( 'sport' );
            $club->phone     		= Input::get( 'phone' );
            $club->email     		= Input::get( 'email' );
            $club->add1   			= Input::get( 'add1' );
            $club->city     		= Input::get( 'city' );
            $club->state       		= Input::get( 'state' );
            $club->description 		= Input::get( 'description' );
            $club->zip       		= Input::get( 'zip' );
            $club->logo 			= Input::get('logo');
            $club->processor_user	= Input::get('cfuser');
            $club->processor_pass	= Input::get('cfpass');
            $id = Auth::user()->id;
            User::find($id)->Clubs()->save($club);

            if ( $club->id )
            {
                // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                // $alert = Lang::get('confide::confide.alerts.account_created');
                // $message =array("message" => $alert);
                // return Response::json($message);
                return Redirect::back()
                ->with( 'messages', 'Club created successfully');
            }


        }
        // Get validation errors (see Ardent package)
        $error = $validator->errors()->all(':message');
        return Redirect::back()
        ->withErrors($validator)
        ->withInput();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//Prevent unauthorize user to see other clubs
		$user =Auth::user();
		$club = Club::find($id);
		if(!$club){
			return Redirect::action('DashboardController@show');
		}
		$title = 'League Together - '.$club->name;
		return View::make('pages.user.club.default')
			->with('page_title', $title)
			->with('club', $club)
			->withUser($user);
		
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$club = Club::find($id);
		$club->delete();
		return Redirect::back();
	}

	public function follow()
  {
  	$user = Auth::user();

  	$club = Club::all();
  	//$followed = $user;
  	//return $user->followers;
    $title = 'League Together - Follow';
    return View::make('pages.signup.follow')
    ->withClubs($club)
    ->withFollowers($user->followers)
    ->with('page_title', $title);
  }
  public function followsave()
  {
  	$user = Auth::user();
  	$follower = New Follower;
  	$follower->user_id = $user->id;
  	$follower->club_id = Input::get('club');
  	$follower->save();

  	return Redirect::back();

  }

  public function unfollow($id)
  {
  	$follow = Follower::find($id);
  	$follow->delete();
  	return Redirect::back();

  }


  public function createclub()
  {
  	$user = Auth::user();
  	$clubs = $user->clubs;

  	//return $clubs;
    $title = 'League Together - Add Club';
    return View::make('pages.signup.createclub')
    ->withClubs($clubs)
    ->with('page_title', $title);
  }

  public function clubshow($id)
  {
  	$club = Club::find($id);
  	return $club;
  }
  

}