<?php
class Communication extends Eloquent {

	protected $fillable = array('send_to','message');

	 // Validation ***************************************************
    public static $rules = array(
			'send_to'=>'sometimes|required|email',
			'message'=>'required|max:500'
	);

    protected $messages = array(
        'send_to.required'          => 'Please enter a recepient',
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
        return $this->hasMany('Message');
    }

}