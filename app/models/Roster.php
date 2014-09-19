<?php

class Roster extends Eloquent {
	protected $fillable = [];
	protected $table = 'rosters';

	public function Players() {
        return $this->belongsTo('Player');    
  }
}