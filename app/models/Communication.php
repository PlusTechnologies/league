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
                    ->select('users.email', 'users.mobile')
                    ->get();
                    //get the message body
                    //Loop user list and send email body
              foreach ($list as $key => $value) {

                $messageBody = $messages->message;
                $phone = $value['mobile'];
                $email = $value['email'];
                $data = array('data'=>$messageBody,'phone'=>$phone);

                Mail::send('emails.receipt.notification', $data, function($message)
                {
                    $message->from('leagueTogether@sports.com', 'League Together');

                    $message->to('nyanzic@gmail.com');
                });
                
              }

              return 1;
            break;
          case 2:
             $list1 = Follower::Where('club_id','=',$club->id)
                    ->join('users', function($join)
                        {
                            $join->on('users.id', '=', 'followers.user_id')
                                 ->where('users.Type', '=', 2);
                        })
                    ->select('users.email', 'users.mobile')
                    ->get();
                    
                    //get the message body
                    //Loop user list and send email body
              foreach ($list1 as $key => $found) {

                $messageBody1 = $messages->message;
                $phone = $found['mobile'];
                $email = $found['email'];
                $data = array('data'=>$messageBody1,'phone'=>$phone);

                Mail::send('emails.receipt.notification', $data, function($message)
                {
                    $message->from('leagueTogether@sports.com', 'League Together');

                    $message->to('nyanzic@gmail.com');
                });
                
              }

              return 1;
          break;
      }
  }

}