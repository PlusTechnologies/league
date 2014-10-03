<?php
class Communication extends Eloquent {

	protected $fillable = array('recepient','message');

	 // Validation ***************************************************
    protected $rules = array(
     'recepient'=>'required|max:10',
     'message'=>'required|max:500'
     );

    protected $messages = array(
        'recepient.required'          => 'Please enter a recepient',
        'message.required'          => 'Message body cannot be empty'
        );

    protected $errors;

    public function validate($data)
    {
        $v = Validator::make($data, $this->rules, $this->messages);
        if ($v->fails())
        {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function message()
    {
        return $this->hasMany('message');
    }

    public function notification($id) {
      $messages = Communication::find($id);
      $case = $messages->recepient;
      $club = Club::find($messages->club_id);
      switch ($case) {
          case 1:
            $list = Follower::Where('club_id','=',$club->id)
                    ->join('users', 'users.id', '=', 'followers.user_id')
                    ->select('users.email', 'users.mobile', 'users.firstname', 'users.lastname')
                    ->get();

                //Get the message body
                $messageBody = $messages->message;

                //Loop user list and send email body
                foreach ($list as $key => $value) {

                    $phone = $value['mobile'];
                    $email = $value['email'];
                    $name = $value['firstname'].' '.$value['lastname'];
                    $data = array('messagedata'=>$messageBody,'phone'=>$phone, 'name'=>$name);

                    try{
                        Mail::send('emails.receipt.notification', $data, function($message)
                        {
                            $message->to('nyanzic@gmail.com')
                                    ->subject('Test notification');    
                        });
                        return 1;
                    }catch(exception $e){
                        return 0;
                    } 
                }

            break;

          case 2:
             $list1 = Roster::Where('player_id','=',$club->id)
                    ->join('player_user', function($join)
                        {
                            $join->on('player_user.player_id', '=', 'rosters.player_id' AND 'player_user.user_id', '=', 'users.id')
                                ->where('users.Type', '=', 2);
                        })
                    ->select('users.email', 'users.mobile', 'users.firstname', 'users.lastname')
                    ->get();

                //Get the message body
                $messageBody = $messages->message;

                //Loop user list and send email body
                foreach ($list as $key => $value) {

                    $phone = $value['mobile'];
                    $email = $value['email'];
                    $name = $value['firstname'].' '.$value['lastname'];
                    $data = array('messagedata'=>$messageBody,'phone'=>$phone, 'name'=>$name);

                    try{
                        Mail::send('emails.receipt.notification', $data, function($message)
                        {
                            $message->to('nyanzic@gmail.com')
                                    ->subject('Test notification');    
                        });
                        return 1;
                    }catch(exception $e){
                        return 0;
                    } 
                }
          break;
      }
  }

}