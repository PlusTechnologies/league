<?php

class EventController extends BaseController {

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

        $validator= Validator::make(Input::all(), Events::$rules);

        if($validator->passes()){

    		$organization = new Organization;
            $organization->name        	= Input::get( 'name' );
            $organization->sport     	= Input::get( 'sport' );
            $organization->add1   		= Input::get( 'add1' );
            $organization->city     	= Input::get( 'city' );
            $organization->state       	= Input::get( 'state' );
            $organization->description 	= Input::get( 'description' );
            $organization->zip       	= Input::get( 'zip' );

            $logo             = input::file('logo');
            $filename = time()."-profile_pic.".$logo->getClientOriginalExtension();
            $path = public_path('images/logo/' . $filename);
            Image::make($logo->getRealPath())->resize(null, 300, true)->crop(200,200)->save($path);
            $organization->logo = "images/logo/".$filename;
            $id = Auth::user()->id;
            User::find($id)->Organizations()->save($organization);


            if ( $organization->id )
            {
                // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                // $alert = Lang::get('confide::confide.alerts.account_created');
                // $message =array("message" => $alert);
                // return Response::json($message);
                return Redirect::action('DashboardController@show')
                ->with( 'messages', 'Orgazation created successfully');
            }


        }
        // Get validation errors (see Ardent package)
        $error = $validator->errors()->all(':message');
        return Redirect::action('EventController@create',$organization->id )
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
		//
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
		//
	}

}