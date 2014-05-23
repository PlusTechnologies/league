<?php

class Organization extends Eloquent{

	protected $fillable = array('name','logo','sport','description','add1','city','state','zip');

	public static $rules = array(
			'name'=>'required|min:3',
			'sport'=>'required',
			'add1'=>'required | min:2',
			'city'=>'required | min:2',
			'state'=>'required | min:2|max:2',
			'zip'=>' required | digits:5',
			'description'=>'required',
			'logo'=>'required | image|mimes:jpg,jpeg,png,gif'
		);
	public function Users() {
        return $this->belongsToMany('User');    
    }

    public function events()
    {
        return $this->hasMany('event');
    }
}