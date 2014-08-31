<?php
class Communication extends Eloquent {

	protected $fillable = array('send_to','message');
	public static $rules = array(
			'send_to'=>'required',
			'message'=>'required'
		);

    public function message()
    {
        return $this->hasMany('Message');
    }

    /*public function club()
    {
        return $this->hasMany('club');
    }*/

}