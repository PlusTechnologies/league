<?php

class DiscountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /discount
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$user =Auth::user();
		$organization = Organization::find($id);
		$title = 'League Together - Discount';
		return View::make('pages.user.organization.discount.default')
			->with('page_title', $title)
			->with('organization', $organization)
			->withUser($user);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /discount/create
	 *
	 * @return Response
	 */
	public function create($id)
	{	
		$user =Auth::user();
		$organization = Organization::find($id);
		$title = 'League Together - Create Discount';
		return View::make('pages.user.organization.discount.create')
			->with('page_title', $title)
			->with('organization', $organization)
			->withUser($user);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /discount
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$organization = Organization::find($id);

		$messages = array(
	        'name.required'     		=> 'Discount name field is required.',
	        'start.required'     		=> 'Start date is required',
	        'end.required'       		=> 'Expired date is required',
	        'percent.required'       	=> 'Discount percent required',
	        'limit.required'       		=> 'Max limit count is required'
        );

		$validator= Validator::make(Input::all(), Discount::$rules, $messages);

        if($validator->passes()){

        	return Input::all();

            // if ( $organization->id )
            // {
            //     // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            //     // $alert = Lang::get('confide::confide.alerts.account_created');
            //     // $message =array("message" => $alert);
            //     // return Response::json($message);
            //     return Redirect::action('DashboardController@show')
            //     ->with( 'messages', 'Orgazation created successfully');
            // }


        }
        // Get validation errors (see Ardent package)
        $error = $validator->errors()->all(':message');
        return Redirect::action('DiscountController@create',$organization->id )
        ->withErrors($validator)
        ->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /discount/{id}
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
	 * GET /discount/{id}/edit
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
	 * PUT /discount/{id}
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
	 * DELETE /discount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}