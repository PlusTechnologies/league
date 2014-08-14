<?php

class Discount extends Eloquent {
	protected $fillable = array('name','start','end','percent','limit');

    // Validation ***************************************************
    protected $rules = array(
        'name'          =>'unique:discounts|required|min:6|alpha_num',
        'start'         =>'required|date|min:1',
        'end'           =>'required|date|after:start|min:1',
        'percent'       =>'required|numeric|min:1|max:100',
        'limit'         =>'required|numeric|min:1',
    );

     protected $rules_update = array(
        'start'         =>'required|date|min:1',
        'end'           =>'required|date|after:start|min:1',
        'percent'       =>'required|numeric|min:1|max:100',
        'limit'         =>'required|numeric|min:1',
    );

    protected $messages = array(
        'name.unique'               => 'Code already exist, please create a new name.',
        'name.required'             => 'Discount code required.',
        'name.alpha_num'            => 'Spaces or special characters are not allow.',
        'start.required'            => 'Start date required',
        'end.required'              => 'Expiration date required',
        'percent.required'          => 'Discount percent off required',
        'limit.required'            => 'Set the limit of times the code can be use required'
    );

    protected $errors;

    public function validate($data)
    {
        $v = Validator::make($data, $this->rules, $this->messages);
        if ($v->fails())
        {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }


    public function validate_update($data)
    {
        $v = Validator::make($data, $this->rules_update, $this->messages);
        if ($v->fails())
        {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }


    public function errors()
    {
        return $this->errors;
    }
    //http://daylerees.com/trick-validation-within-models
    //***************************************************

	public function Club()
    {
        return $this->belongsTo('club');
    }

    public function expired($org)
    {
    	$now = new DateTime;
    	$now->setTimezone(new DateTimeZone('America/Chicago'));
        $discounts = Discount::where('club_id','=',$org)->where('end','<',$now)->get();

        $stats  = DB::table('discounts AS d')
                ->leftjoin('payments AS p', 'd.id', '=', 'p.promo')
                ->where('d.club_id', '=', $org)
                ->where('d.end','<',$now)
                ->groupBy('d.name')
                ->orderBy('p.created_at', 'ASC')
                ->get([
                DB::raw('SUM(p.discount) as saved'),
                DB::raw('COUNT(p.promo) as used'),
                DB::raw('d.*')
                ]);
        return $stats;

        return $stats;
    }

    public function available($org)
    {
    	$now = new DateTime;
    	$now->setTimezone(new DateTimeZone('America/Chicago'));

         $stats  = DB::table('discounts AS d')
                ->leftjoin('payments AS p', 'd.id', '=', 'p.promo')
                ->where('d.club_id', '=', $org)
                ->where('d.end','>',$now)
                ->groupBy('d.name')
                ->orderBy('p.created_at', 'ASC')
                ->get([
                DB::raw('SUM(p.discount) as saved'),
                DB::raw('COUNT(p.promo) as used'),
                DB::raw('d.*')
                ]);
        return $stats;
    }

    public function validation($code)
    {
        $now = new DateTime;
        $now->setTimezone(new DateTimeZone('America/Chicago'));
        $discount = Discount::where('name','=',$code)->First();

        if(!$discount){
            //retrived data save from API - See API documentation
            $data = array(
                'success'   => false,
                'error'     => "Discount code not available."
                );
            return $data;

        }else{
            $used = ($discount->limit) - count(Payment::where('promo','=',$code)->get());
            if( $discount->start <= $now->format('Y-m-d') && $discount->end >= $now->format('Y-m-d') && $used > 0)
            {
                //allow only one discount at a single time
                Session::forget('discount');
                Session::flash('discount', array('percent'=>$discount->percent,'id'=>$discount->id));
                //retrived data save from API - See API documentation
                $data = array(
                'success'   => true,
                'now'       => $now->format('Y-m-d'),
                'start'     => $discount->start,
                'end'       => $discount->end
                );
                return $data;

            }else{

                $data = array(
                'success'   => false,
                'error'     => "Discount code not active or past validation day"
                );
                return $data;

            }
        }
    }
    public function graph(){
        $range = Carbon::now()->subDays(7);
        $stats = DB::table('payments')
                ->where('created_at', '>=', $range)
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('SUM(discount) as value')
                ]);


        return $stats;
    }
}