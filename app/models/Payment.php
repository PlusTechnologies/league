<?php

class Payment extends Eloquent {
	protected $fillable = [];

	public function Items()
    {
        return $this->hasMany('item');
    }

}