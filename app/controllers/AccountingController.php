<?php

class AccountingController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$queryError = Session::get('message');
		$result = Session::get('result_query');
		setlocale(LC_MONETARY,"en_US");
		$user = Auth::user();
		$club = Club::find($id);
		$pay = new Payment;
		$param = false;
		$payhistory = $pay->history($param, $club);
		$title = 'Accounting Overview';

		if($queryError){
		return View::make('pages.user.club.accounting.default') 
		->with('user',$user)
		->with('club', $club)
		->with('history', $payhistory)
		->with('messages', $queryError)
		->with('page_title', $title);
		}

		if($result){
			return View::make('pages.user.club.accounting.default') 
		->with('user',$user)
		->with('club', $club)
		->with('history', $result)
		->with('page_title', $title);
		}else{
		return View::make('pages.user.club.accounting.default') 
		->with('user',$user)
		->with('club', $club)
		->with('history', $payhistory)
		->with('page_title', $title);	
		}
		
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
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'all entries go into the table';
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

	/**
	 * Retrieve accounting history for the specified period.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function accounthistory($id)
	{
		
		$eventData = Input::all();
		$pay = new Payment;
		$transaction = $pay->history($eventData, $id);

		if($transaction){

			return Redirect::action('AccountingController@index', $id)
			->with('result_query',$transaction);

		}else{

			$errors = "Incorrect dates!";
			return Redirect::action('AccountingController@index', $id)
			->with('message',$errors);
		}
	 	
	}
}
