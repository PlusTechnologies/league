<?php

class Club extends Eloquent{

	protected $fillable = array('name','email','phone', 'logo','sport','description','add1','city','state','zip','processor_user','processor_pass');
	public static $rules = array(
			'name'			=>'required|min:3',
			'phone'			=>'required',
			'email'			=>'required',
			'add1'			=>'required | min:2',
			'city'			=>'required | min:2',
			'state'			=>'required | min:2|max:2',
			'zip'			=>'required | digits:5',
			'sport'			=>'required',
			'description'	=>'required',
			'logo'			=>'required',
			'cfuser'		=>'required',
			'cfpass'		=>'required'
		);
	public function Users() {
        return $this->belongsToMany('User')->withTimestamps();    
  }

    public function Events()
    {
        return $this->hasMany('evento');
    }

    public function Programs()
    {
        return $this->hasMany('program');
    }

    public function Discounts()
    {
        return $this->hasMany('discount');
    }
}