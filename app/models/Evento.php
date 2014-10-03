<?php

class Evento extends Eloquent {

	protected $fillable = array('name','type','descriptions','location','fee','group_fee','start','end','open','close');
	protected $table = 'events';

	public static $rules = array(
		'name'			=>'required',
		'type'			=>'required',
		'descriptions'	=>'alpha_dash',
		'location'		=>'required',
		'fee'			=>'required|numeric',
		'group_fee'		=>'numeric',
		'start'			=>'required|date',
		'end'			=>'required|date|after:start',
		'open'			=>'required|date',
		'close'			=>'required|date|after:open'
	);

	public function Club()
    {
        return $this->belongsTo('club');
    }
    public function Participants()
    {
         return $this->hasMany('participant', 'event')
            ->join('users', 'event_participant.user', '=', 'users.id')
            ->join('payments', 'event_participant.payment', '=', 'payments.id')
            ->select('*');
    }
    // public function Users()
    // {
    //     return $this->hasMany('item');
    // }

    public function Users() {
        return $this->belongsToMany('User','event_participant', 'user','event' )
        ->withPivot("payment")
        ->join('payments', 'event_participant.payment', '=', 'payments.id')
        ->select('*');
    }

    public static function validate($id) {

        $now = new DateTime;
        $now->setTimezone(new DateTimeZone('America/Chicago'));
        $e = Evento::find($id);

        if($e->open <= $now->format('Y-m-d') && $now->format('Y-m-d') <= $e->close){
            return true;
        }
        return false;

    }

    public function camps($org)
    {
        $now = new DateTime;
        $now->setTimezone(new DateTimeZone('America/Chicago'));
        $now = $now->format('Y/m/d');
        $events = Evento::where('club_id','=',$org)->first();
        if($events){
            $stats  = DB::table('events AS e')
                ->leftJoin('payment_item as pi', 'e.id', '=', 'pi.item')
                ->where('e.club_id', '=', $org)
                ->where('e.type','=',1)
                ->orderBy('e.created_at', 'ASC')
                ->get([
                    DB::raw('e.*'),
                    DB::raw('SUM(pi.price) as total'),
                    DB::raw("if(e.close >= '$now' ,'Open','Close') as status")
                ]);
            return $stats;
        }
        return;
        

    }

    public function tryouts($org)
    {
        $now = new DateTime;
        $now->setTimezone(new DateTimeZone('America/Chicago'));
        $now = $now->format('Y-m-d');
        $events = Evento::where('club_id','=',$org)->first();
        if($events){
        $stats  = DB::table('events AS e')
                ->leftJoin('payment_item as pi', 'e.id', '=', 'pi.item')
                ->where('e.club_id', '=', $org)
                ->where('e.type','=',2)
                ->orderBy('e.created_at', 'ASC')
                ->get([
                    DB::raw('e.*'),
                    DB::raw('SUM(pi.price) as total'),
                    DB::raw("if(e.close >= '$now' AND e.end >='$now' ,'Open','Close') as status")
                ]);
        return $stats;
        }
        return;
    }





    
}

