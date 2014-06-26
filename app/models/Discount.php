<?php

class Discount extends \Eloquent {
	protected $fillable = array('name','start','end','percent','count');

	public static $rules = array(
		'name'			=>'required|min:2',
		'start'			=>'required|date',
		'end'			=>'required|date',
		'percent'		=>'required|numeric|max:100',
		'count'			=>'required|numeric',
	);

}