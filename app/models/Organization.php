<?php

class Organization extends Eloquent{

	protected $fillable = array('name','logo','sport','description','add1','city','state','zip');

	public static $rules = array(
			'name'=>'required|min:2',
			'logo'=>'image|mimes:jpg,jpeg,png,gif',
			'sport'=>'required',
			'add1'=>'min:2',
			'city'=>'min:2',
			'state'=>'min:2|max:2',
			'zip'=>'digits:5',
		);
	public function Users() {
        return $this->belongsToMany('User');    
    }
}