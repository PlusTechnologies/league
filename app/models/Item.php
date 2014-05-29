<?php

class Item extends Eloquent {
	protected $fillable = [];

	public function Payments()
    {
        return $this->belongsTo('payment');
    }

}