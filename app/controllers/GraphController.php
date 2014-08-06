<?php

class GraphController extends \BaseController {


	public function discount(){
		$days 	= Input::get('days', 7);
		$org 	= Input::get('org', 1);
		$type 	= Input::get('type');

		if($type == 1){
			$range 	= Carbon::now()->subDays($days);
        	$stats 	= DB::table('payments AS p')
        		->join('discounts AS d', 'p.promo', '=', 'd.id')
                ->where('p.created_at', '>=', $range)
                ->where('d.organization_id', '=', $org)
                ->groupBy('date')
                ->groupBy('p.promo')
                ->orderBy('date', 'ASC')
                ->get([
                DB::raw('Date(p.created_at) as date'),
                DB::raw('SUM(p.discount) as value')
                ]);
        return $stats;
		}else{
			$range 	= Carbon::now()->subDays($days);
        	$stats 	= DB::table('payments AS p')
        		->join('discounts AS d', 'p.promo', '=', 'd.id')
                ->where('p.created_at', '>=', $range)
                ->where('d.organization_id', '=', $org)
                ->groupBy('p.promo')
                ->orderBy('p.created_at', 'ASC')
                ->get([
                DB::raw('d.name as label'),
                DB::raw('COUNT(p.promo) as value')
                ]);
        return $stats;
		}
        
    }

	/**
	 * Display a listing of the resource.
	 * GET /graph
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /graph/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /graph
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /graph/{id}
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
	 * GET /graph/{id}/edit
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
	 * PUT /graph/{id}
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
	 * DELETE /graph/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}