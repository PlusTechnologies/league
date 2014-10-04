<?php

class Player extends Eloquent {
	//protected $fillable = [];

	public static $rules = array(

		'firstname' 	=> 'required|alpha|min:2',
		'lastname'    => 'required|alpha|min:2',
		'dob'         => 'required',
		'gender'      => 'required',
		'year'        => 'required',
		'position'    => 'required',
		'relation'    => 'required'
	);

	public function users() {
		return $this->belongsToMany('User', 'player_user', 'player_id','user_id')
		->withPivot('relation')
		->withTimestamps();    
  }

  /*public function players()
 {
     return $this->hasMany('Player');
 }*/

  public function getPlayer($id){
  	$playerData = Player::where('id', '=', $id)->get();
  	return $playerData;
  }

}