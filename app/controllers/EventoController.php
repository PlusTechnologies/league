<?php

class EventoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$user =Auth::user();
		$organization = Organization::find($id);
		$title = 'League Together - '.$organization ->name.' Event';
		return View::make('pages.user.organization.event.create')
		->with('page_title', $title)
		->with('organization', $organization)
		->withUser($user);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		
		$organization = Organization::find($id);	

		$validator= Validator::make(Input::all(), Evento::$rules);

		if($validator->passes()){

			$event = new Evento;
			$event->name        = Input::get( 'name' );
			$event->type     	= Input::get( 'type' );
			$event->description = Input::get( 'description' );
			$event->location 	= Input::get( 'location' );
			$event->fee       	= Input::get( 'fee' );
			$event->group_fee	= Input::get('fee_group');
			$event->start 		= Input::get( 'start' );
			$event->end       	= Input::get( 'end' );
			$event->open       	= Input::get( 'open' );
			$event->close       = Input::get( 'close' );

			Organization::find($id)->Events()->save($event);

			if ( $event->id )
			{
                // Redirect with success message.
       
				return Redirect::action('OrganizationController@show')
				->with( 'messages', 'Event created successfully');
			}


		}
        // Get validation errors (see Ardent package)
		$error = $validator->errors()->all(':message');
		return Redirect::action('EventoController@create',$organization->id )
		->withErrors($validator)
		->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($organizationid,$event)
	{

		setlocale(LC_MONETARY,"en_US");
		$user= Auth::user();

		$organization = User::with('organizations')->whereid($user->id)->firstOrFail();
		$e = Evento::with('organization')->whereId($event)->firstOrFail();
		$participant = Evento::with('users')->whereId($event)->firstOrFail();
		// $participant = DB::table('event_participant')
		// ->join('payments', 'event_participant.payment', '=', 'payments.id')
		// ->join('users','event_participant.user', '=', 'users.id')
		// ->where('event', '=', $e->id)->get();
		
		return $participant;
		$title = 'League Together - '.$e->name.' Event';

		if($organization->organizations->contains($organizationid)){

			if ($e->id == $event && $e->organization->id == $organizationid )
			{	
				return View::make('pages.user.organization.event.default')
					->with('page_title', $title)
					->withEvent($e)
					->withUser($user)
					->with('message', 'message flash here')
					->with('participants', $participant);
			}else
			{
				return View::action('OrganizationController@show')
				->with('message', 'no event found');

			}
		}else{

			return View::action('OrganizationController@show')
				->with('message', 'permission denied');

		}
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function publico($id)
	{
		$e = Evento::with('organization')->whereId($id)->firstOrFail();
		$title = 'League Together - '.$e->name.' Event';
		return View::make('pages.public.event')
					->with('page_title', $title)
					->withEvent($e)
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

		$event = Evento::whereId($eve)->where('organization_id', '=', $org)->firstOrFail();
		$user =Auth::user();
		$organization = Organization::with('events')->whereId($eve)->firstOrFail();
		$title = 'League Together - '.$organization ->name.' Event';
		return View::make('pages.user.organization.event.edit')
		->with('page_title', $title)
		->with('organization', $organization)
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