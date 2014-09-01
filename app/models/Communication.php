<?php
class Communication extends Eloquent {

	protected $fillable = array('recepient','message');

	 // Validation ***************************************************
    protected $rules = array(
			'recepient'=>'sometimes|required|email',
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
        return $this->hasMany('Message');
    }

}