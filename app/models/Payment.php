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

    public function create_customer($param){
        $cart = CardFlex::vault_create($param);
        $object = json_decode(json_encode($cart), FALSE);

    return $object ;

    }

    public function ask($param){
        $cart = CardFlex::query($param);
        $xml = simplexml_load_string($cart);
        $object = json_decode(json_encode($xml), FALSE);

    return $object;

    }

}