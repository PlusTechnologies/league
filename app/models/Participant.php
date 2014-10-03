<?php

class Participant extends Eloquent {
	protected $fillable = [];
	protected $table = 'event_participant';

	public function Events()
    {
        return $this->belongsTo('evento', 'event');
    }

    public function Payments()
    {
        return $this->belongsTo('payment', 'payment');
    }

    public function Users()
    {
        return $this->belongsTo('user', 'user');
    }


}