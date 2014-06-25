<?php

class Discount extends \Eloquent {
	protected $fillable = array('name','start','end','percent','count');
}