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
		setlocale(LC_MONETARY,"en_US");
		// Session::flush();
		// array_values(Session::get('order.item'));
		// return Session::get('order.item');
		//return Cart::contents(true);
		return View::make('pages.public.cart')
					->with('page_title', 'Order')
					->with('products',Cart::contents());
	}

	
	public function addtocart()
	{

		if(Input::get('order')==1){
			$group 	= Input::get('team');
			$id 	= Input::get('event');
			$qty	= Input::get('qty');
			$e = Evento::with('organization')->whereId(Input::get('event'))->firstOrFail();

			if(!$group == 1){
				$s = Cart::insert(array(
					'id'			=> $e->id.$group,
					'name'			=> $e->name. '- Player Registration',
					'price'			=> $e->fee,
					'quantity'		=> $qty,
					'tax'      		=> getenv("SV_FEE"),
					'organization' 	=> $e->organization->name,
					'event'			=> $e->id
				));
			}else{
				$s = Cart::insert(array(
					'id'			=> $e->id.$group,
					'name'			=> $e->name . '- Team Registration',
					'price'			=> $e->group_fee,
					'quantity'		=> $qty,
					'tax'      		=> getenv("SV_FEE"),
					'organization' 	=> $e->organization->name,
					'event'			=> $e->id 
				));
			}
		}
		return Redirect::action('PaymentController@index');

		//return Redirect::action('PaymentController@create');
	}

	public function removefromcart($i)
	{
		$item = Cart::item($i);
		$item->remove();
		
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
		setlocale(LC_MONETARY,"en_US");
		$user =Auth::user();
		return View::make('pages.public.checkout')
					->with('page_title', 'Checkout')
					->withUser($user)
					->with('products',Cart::contents());
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

		$amount = Cart::total();
		$user =Auth::user();
		
		$params = "username=cfdemo&password=cfdemo2013&type=sale&ccnumber=5431111111111111&ccexp=0715&cvv=999&amount=$amount&email=$user->email";
		$uri = "https://secure.cardflexonline.com/api/transact.php";
		$ch = curl_init($uri);
		curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER  =>true,
		CURLOPT_VERBOSE     => 1,
		CURLOPT_POSTFIELDS =>$params
		));
		
		$out = curl_exec($ch) or die(curl_error());

		$response_array = parse_str($out, $output);
		curl_close($ch);

		$object = json_decode(json_encode($output), FALSE);

		return $object->responsetext;



		$i = Input::all();
		$cart = Cart::contents(true);
		return $i;
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