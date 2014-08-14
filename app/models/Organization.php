<?php

class Organization extends Eloquent{

	protected $fillable = array('name','email','phone', 'logo','sport','description','add1','city','state','zip');
	public static $rules = array(
			'name'=>'required|min:3',
			'phone'=>'required',
			'email'=>'required',
			'add1'=>'required | min:2',
			'city'=>'required | min:2',
			'state'=>'required | min:2|max:2',
			'zip'=>' required | digits:5',
			'sport'=>'required',
			'description'=>'required',
			'logo'=>'required'
		);
	public function Users() {
        return $this->belongsToMany('User')->withTimestamps();    
  }

    public function Events()
    {
        return $this->hasMany('evento');
    }
    public function Discounts()
    {
        return $this->hasMany('discount');
    }
}