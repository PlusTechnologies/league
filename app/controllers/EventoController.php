<?php
class EventoController extends BaseController {

	 public function __construct()
    {
        $this->beforeFilter('club', ['except'=>'publico']);
        $this->beforeFilter('csrf', ['on' => array('create','edit')]);
    }

   

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{	

		setlocale(LC_MONETARY,"en_US");
		$user= Auth::user();
		$club= Club::find($id)->with('events')->first();
		$e = new Evento;
		$title = 'League Together - '.$club->name.' Event';

		return View::make('pages.user.club.event.default')
		->with('page_title', $title)
		->with('club', $club)
		->withCamps($e->camps($id))
		->withTryouts($e->tryouts($id))
		->withUser($user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$user =Auth::user();
		$club = Club::find($id);
		$title = 'League Together - '.$club ->name.' Event';
		return View::make('pages.user.club.event.create')
		->with('page_title', $title)
		->with('club', $club)
		->withUser($user);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		
		$club = Club::find($id);	

		$validator= Validator::make(Input::all(), Evento::$rules);

		if($validator->passes()){

			$event = new Evento;
			$event->name        = Input::get( 'name' );
			$event->type     		= Input::get( 'type' );
			$event->description = Input::get( 'description' );
			$event->location 		= Input::get( 'location' );
			$event->fee       	= Input::get( 'fee' );
			$event->group_fee		= Input::get('fee_group');
			$event->start 			= Input::get( 'start' );
			$event->end       	= Input::get( 'end' );
			$event->open       	= Input::get( 'open' );
			$event->close       = Input::get( 'close' );

			Club::find($id)->Events()->save($event);

			if ( $event->id )
			{
                // Redirect with success message.
       
				return Redirect::action('ClubController@show')
				->with( 'messages', 'Event created successfully');
			}


		}
        // Get validation errors (see Ardent package)
		$error = $validator->errors()->all(':message');
		return Redirect::action('EventoController@create',$club->id )
		->withErrors($validator)
		->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($clubid,$event)
	{

		setlocale(LC_MONETARY,"en_US");
		$user= Auth::user();

		$club = User::with('clubs')->whereid($user->id)->firstOrFail();
		$e = Evento::with('club')->whereId($event)->firstOrFail();
		$participant = Evento::with('participants')->whereId($event)->firstOrFail();
		// $participant = DB::table('event_participant')
		// ->join('payments', 'event_participant.payment', '=', 'payments.id')
		// ->join('users','event_participant.user', '=', 'users.id')
		// ->where('event', '=', $e->id)->get();
		
		$title = 'League Together - '.$e->name.' Event';

		//return $participant;
		return View::make('pages.user.club.event.show')
		->with('page_title', $title)
		->withEvent($e)
		->withUser($user)
		->with('message', 'message flash here')
		->with('club', $club)
		->with('participants', $participant->participants);		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publico($id)
	{	
		$e = Evento::with('club')->whereId($id)->firstOrFail();
		$eval = Evento::validate($id);
		$title = 'League Together - '.$e->name.' Event';
		return View::make('pages.public.event')
					->with('page_title', $title)
					->withEvent($e)
					->with('valid',$eval)
					->with('message', 'message flash here');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($org, $eve)
	{

		$event = Evento::whereId($eve)->where('club_id', '=', $org)->firstOrFail();
		$user =Auth::user();
		$club = Club::find($org);

		return $club;
		$title = 'League Together - '.$club ->name.' Event';
		return View::make('pages.user.club.event.edit')
		->with('page_title', $title)
		->with('club', $club)
		->with('event', $event)
		->withUser($user);
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
		//
	}

}