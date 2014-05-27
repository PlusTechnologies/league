<?php

class PaymentController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /payment
	 *
	 * @return Response
	 */
	public function index()
	{
		// Session::flush();
		// array_values(Session::get('order.item'));
		// return Session::get('order.item');
		return View::make('pages.public.cart')
					->with('page_title', 'Order');
	}

	
	public function addtocart()
	{
		if(Input::get('order')==1){
			$e = Evento::with('organization')->whereId(Input::get('event'))->firstOrFail();
			$s = Session::push('order.item',array(
				'event'			=> $e->id,
				'type'			=> $e->type,
				'organization'	=> $e->organization->id
				));
		}

		return Redirect::action('PaymentController@index');

		//return Redirect::action('PaymentController@create');
	}

	public function removefromcart()
	{

		$i = Input::get('index');
		// $a = Session::get('order.item.'.$i);
		// $b = Session::get('order.item');
		// unset($a);


		$o = Session::get('order.item');
		unset($o[$i]);
		Session::flush();
		Session::push('order.item', $o);


		//$s = array_splice($a, $i);  // removes $input[1] array_except($a, $i);
			
		return $o;
		
		return Redirect::action('PaymentController@index');
		//return Redirect::action('PaymentController@create');
	}



	/**
	 * Show the form for creating a new resource.
	 * GET /payment/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.public.cart')
					->with('page_title', 'Order');
		return Session::get('order.item');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /payment
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /payment/{id}
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
	 * GET /payment/{id}/edit
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
	 * PUT /payment/{id}
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
	 * DELETE /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}