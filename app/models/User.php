<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {
	/**
     * Validation rules
     */
    public static $rules = array(

        'firstname' 	=> 'required|alpha|min:3',
        'lastname' 	    => 'required|alpha|min:5',
        'email' 		=> 'required|email|unique:users',
        'mobile'          => 'required',
        'avatar'        => 'required|image|mimes:jpg,jpeg,png,gif',
        'password' 		=> 'required|between:8,20|confirmed',
        'password_confirmation' => 'required|between:8,20'
    );

    public function Organizations() {
        return $this->belongsToMany('Organization');    
    }

}