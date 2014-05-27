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

	public function Organization()
    {
        return $this->belongsTo('organization');
    }
}

