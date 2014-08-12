<?php

class DiscountController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('organization', ['except' => array('validate')]);
        $this->beforeFilter('csrf', ['on' => array('create','edit')]);
    }

	/**
	 * Display a listing of the resource.
	 * GET /discount
	 *
	 * @return Response
	 */
	public function index($id)
	{
		setlocale(LC_MONETARY,"en_US");
		$user =Auth::user();
		$organization = Organization::find($id);
		$discounts = new Discount;
		$title = 'League Together - Discount';
		return View::make('pages.user.organization.discount.default')
			->with('page_title', $title)
			->with('organization', $organization)
			->with('discounts_available',$discounts->available($id))
			->with('discounts_expired',$discounts->expired($id))
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
		//get current organization
		$organization = Organization::find($id);
		// get the POST data
		$input = Input::all();
		// create a new model instance
		$discount = new Discount;
		$ignored = null;
		// attempt validation
		if ($discount->validate($input,$ignored))
		{
		  $discount->name 		= strtoupper(Input::get( 'name' ));
			$discount->start 		= Input::get( 'start' );
			$discount->end 			= Input::get( 'end' );
			$discount->percent 	= Input::get( 'percent' )/100;
			$discount->limit 		= Input::get( 'limit' );

			Organization::find($id)->Discounts()->save($discount);

			if ( $discount->id )
			{
                // Redirect with success message.
				return Redirect::action('DiscountController@index', $organization->id)
				->with( 'messages', 'Discount created successfully');
			}
		}
		else
		{
		    // failure, get errors
		    $errors = $discount->errors();
		    return Redirect::action('DiscountController@create',$organization->id )
        	->withErrors($errors)
        	->withInput();
		}



		// $messages = array(
		// 	'name.unique'     			=> 'Code already exist, please create a new name.',
		// 	'name.required'     		=> 'Discount code required.',
		// 	'name.alpha_num'     		=> 'Spaces or special characters are not allow.',
		// 	'start.required'     		=> 'Start date required',
		// 	'end.required'       		=> 'Expiration date required',
		// 	'percent.required'       	=> 'Discount amount represented as percent required',
		// 	'limit.required'       		=> 'Set the limit of times the code can be use required'
		// 	);

		// $validator= Validator::make(Input::all(), Discount::$rules, $messages);

		// if($validator->passes()){

		// 	$discount = new Discount;
		// 	$discount->name 	= strtoupper(Input::get( 'name' ));
		// 	$discount->start 	= Input::get( 'start' );
		// 	$discount->end 		= Input::get( 'end' );
		// 	$discount->percent 	= Input::get( 'percent' )/100;
		// 	$discount->limit 	= Input::get( 'limit' );

		// 	Organization::find($id)->Discounts()->save($discount);

		// 	if ( $discount->id )
		// 	{
		// 		// Redirect with success message.
		// 		return Redirect::action('DiscountController@index', $organization->id)
		// 		->with( 'messages', 'Discount created successfully');
		// 	}

		// }
		// // Get validation errors (see Ardent package)
		// $error = $validator->errors()->all(':message');
		// return Redirect::action('DiscountController@create',$organization->id )
		// ->withErrors($validator)
		// ->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /discount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function validate()
	{
		$param = Input::get('code');

		if($param){
			$discount = new Discount;
			$valid = $discount->validation($param);
			return $valid;

		}else{
			$data = array(
                    'success'   => false
            );
            return $data;
		}

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
	public function edit($org, $id)
	{
		$user =Auth::user();
		//validate that organization belongs to current user
		$organization = $user->Organizations()->with('discounts')->whereOrganization_id($org)->firstOrFail();

		if(!$organization){
			return Redirect::action('OrganizationController@index');
		}

		//get discount information
		$discount = Discount::where('organization_id','=',$organization->id)->whereId($id)->firstOrFail();
		$title = 'League Together - Edit discount';
		return View::make('pages.user.organization.discount.edit')
		->with('page_title', $title)
		->with('organization', $organization)
		->with('discount',$discount)
		->withUser($user);

		
		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /discount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($org, $id)
	{
		//get current organization
		$organization = Organization::find($org);
		// get the POST data
		$input = Input::all();
		// create a new model instance
		$discount = Discount::find($id);
		// attempt validation
		if ($discount->validate_update($input))
		{
			$discount->start 	= Input::get( 'start' );
			$discount->end 		= Input::get( 'end' );
			$discount->percent 	= Input::get( 'percent' )/100;
			$discount->limit 	= Input::get( 'limit' );

			$discount->save();

			if ( $discount->id )
			{
                // Redirect with success message.
				return Redirect::action('DiscountController@index', $organization->id)
				->with( 'messages', 'Discount created successfully');
			}
		}
		else
		{
		    // failure, get errors
		    $errors = $discount->errors();
		    return Redirect::action('DiscountController@update',$organization->id )
        	->withErrors($errors)
        	->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /discount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($organization,$id)
	{

		$discount = Discount::find($id);
		$status = $discount->delete();
		if($status){
			return Redirect::action('DiscountController@index', $organization);
		}

		return Redirect::action('DiscountController@index', $organization)->withErrors($status);

		
	}

}