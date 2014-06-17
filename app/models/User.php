<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {
    protected $fillable = array('firstname','lastname','email', 'mobile','avatar','password','password_confirmation');
	/**
     * Validation rules
     */
    public static $rules = array(

        'firstname' 	=> 'required|alpha|min:3',
        'lastname' 	    => 'required|alpha|min:5',
        'email' 		=> 'required|email|unique:users',
        'mobile'          => 'required',
        'avatar'        => 'required',
        'password' 		=> 'required|between:8,20|confirmed',
        'password_confirmation' => 'required|between:8,20'
    );

    public function Organizations() {
        return $this->belongsToMany('Organization');    
    }

    public function Events() {
        return $this->belongsToMany('Evento','event_participant', 'event', 'user')
        ->withPivot("payment", "payment");
    }

}