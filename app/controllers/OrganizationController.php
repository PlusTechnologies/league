<?php

class OrganizationController extends BaseController {


	 /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('organization', ['except' => array('index','create','store')]);
        $this->beforeFilter('csrf', ['on' => array('create','edit')]);
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user =Auth::user();
		$organizationlist = $user->organizations;
		//return $organizationlist;
		$title = 'League Together - Dashboard';
		return View::make('pages.user.organization.dashboard')
			->with('page_title', $title)
			->with('organizations', $organizationlist)
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
		$title = 'League Together - Organization';
		return View::make('pages.user.organization.create')
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

        $validator= Validator::make(Input::all(), Organization::$rules, $messages);

        if($validator->passes()){

    		$organization = new Organization;
            $organization->name        	= Input::get( 'name' );
            $organization->sport     	= Input::get( 'sport' );
            $organization->phone     	= Input::get( 'phone' );
            $organization->email     	= Input::get( 'email' );
            $organization->add1   		= Input::get( 'add1' );
            $organization->city     	= Input::get( 'city' );
            $organization->state       	= Input::get( 'state' );
            $organization->description 	= Input::get( 'description' );
            $organization->zip       	= Input::get( 'zip' );

            $logo             = input::file('logo');
            $filename = time()."-profile_pic.".$logo->getClientOriginalExtension();
            $path = public_path('images/logo/' . $filename);
            Image::make($logo->getRealPath())->resize(null, 400,function($constraint){ $constraint->aspectRatio(); })->save($path);
            $organization->logo = "/images/logo/".$filename;
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
        return Redirect::action('OrganizationController@create')
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
		//Prevent unauthorize user to see other organizations
		$user =Auth::user();
		$organization = Organization::find($id);
		if(!$organization){
			return Redirect::action('DashboardController@show');
		}
		$title = 'League Together - '.$organization->name;
		return View::make('pages.user.organization.default')
			->with('page_title', $title)
			->with('organization', $organization)
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
		//
	}

}