<?php

class Item extends Eloquent {
	protected $fillable = [];
	protected $table = 'payment_item';

	public function Payments()
    {
        return $this->belongsTo('payment');
    }

}