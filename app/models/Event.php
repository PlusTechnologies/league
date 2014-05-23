<?php

class Events extends Eloquent {

	protected $fillable = array('name','type','descriptions','location','fee','group_fee','start','end','open','close');
	
	public static $rules = array(
		'name'			=>'required',
		'type'			=>'required',
		'descriptions'	=>'alpha_dash',
		'location'		=>'required',
		'fee'			=>'required|numeric',
		'group_fee'		=>'numeric',
		'start'			=>'required|date',
		'end'			=>'required|date',
		'open'			=>'required|date',
		'close'			=>'required|date'
	);

	public function organization()
    {
        return $this->belongsTo('organization');
    }
}

