<?php

class CommunicationController extends \BaseController {

	/**
	 * @var communicationForm.
	 *
	 * @return Response
	 */
	private $communicationForm;

	function _construct(CommunicationForm $communicationForm)
	{
		$this->CommunicationForm = $communicationForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$user = Auth::user();
		$title = 'Communication Dashboard';
		return View::make('pages.user.club.communication.default') 
		->with('user',$user)
		->with('page_title', $title);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{

		$communication = new Communication;
		//get current club
		$club = Club::find($id);
		// get the POST data
		$input = Input::all();
		$ignored = null;
		// attempt validation
		if ($communication->validate($input,$ignored))
		{
		$communication->recepient 		= Input::get( 'send_to' );
		$communication->message 		= Input::get( 'message' );

		$communication->save();
		if ( $communication->id )
			{
                // Redirect with success message.
				return Redirect::action('CommunicationController@index', $club->id)
				->with( 'messages', 'Message sent successfully');
			}
		}
		else
		{
		    // failure, get errors
		    $errors = $communication->errors();
		    return Redirect::action('CommunicationController@create',$club->id )
        	->withErrors($errors)
        	->withInput();
		}
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
