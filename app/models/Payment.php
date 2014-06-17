<?php

class Payment extends Eloquent {
	protected $fillable = [];

	public function Items()
    {
        return $this->hasMany('item');
    }

    public function sale($param){
	    $cart = CardFlex::sale($param);
	    $object = json_decode(json_encode($cart), FALSE);

    return $object ;

    }

}