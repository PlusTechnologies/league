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
		$club = Club::find($id);
		$title = 'Communication Dashboard';
		return View::make('pages.user.club.communication.default') 
		->with('user',$user)
		->with('club',$club)
		->with('page_title', $title);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$user = Auth::user();
		$title = 'Communication create';
		$club = Club::find($id);
		return View::make('pages.user.club.communication.create') 
		->with('user',$user)
		->with('club',$club)
		->with('page_title', $title);
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

       // return var_dump($input);

		// attempt validation
		if ($communication->validate($input))
		{
			$communication->club_id 		= $club->id;
			$communication->recepient 		= Input::get( 'recepient' );
			$communication->message 		= Input::get( 'message' );
			$communication->save();
		
		if ( $communication->id )
			{	
				Communication::notification($communication->id);

                // Redirect with success message.
                $comm = new Communication;
                $notify = $comm->notification($communication->id);
                if($notify > 0){
                	return Redirect::action('CommunicationController@index', $club->id)
					->with( 'messages', 'Message sent successfully');
                }else{
                	return Redirect::action('CommunicationController@index', $club->id)
					->with( 'messages', 'Message was not sent... Either the users selected dont exist or something went wrong!');
                }	
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
		return $communication;
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
