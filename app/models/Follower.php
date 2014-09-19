<?php

class Follower extends Eloquent {
	protected $fillable = [];
	protected $table = 'followers';

	public function Users() {
        return $this->belongsTo('User');    
  }

 

}