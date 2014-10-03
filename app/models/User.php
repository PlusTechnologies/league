<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;
    protected $fillable = array('firstname','customer_id','lastname','email', 'mobile','type', 'plan','avatar','password');
    /**
     * Validation rules
     */
    public static $rules = array(
        'email'         => 'required|email|unique:users,email',
        'password'      => 'required|between:8,20',
        'firstname'     => 'required|alpha|min:3',
        'lastname'      => 'required|alpha|min:5',
        'mobile'        => 'required',
        'type'          => 'required',
        'avatar'        => 'required',
    );
    //protected $guarded = array('password','confirmation_code');
    public $hidden = array('password');

    public function players() {
        return $this->belongsToMany('Player', 'player_user', 'user_id', 'player_id')
        ->withPivot('relation')
        ->withTimestamps();  
    }
    public function Clubs() {
        return $this->belongsToMany('Club');    
    }

    public function Events() {
        return $this->belongsToMany('Evento','event_participant', 'event', 'user')
        ->withPivot("payment", "payment");
    }
    public function Followers() {
        return $this->hasMany('Follower')
        ->join('clubs', 'followers.club_id', '=', 'clubs.id')
        ->select('followers.id', 'clubs.name', 'clubs.logo', 'clubs.email', 'clubs.city','clubs.state');
    }

}
