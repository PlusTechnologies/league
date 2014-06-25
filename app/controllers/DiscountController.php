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
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /discount
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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