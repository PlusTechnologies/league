<?php

class Payment extends Eloquent {
	protected $fillable = [];

	public function Items()
    {
        return $this->hasMany('item');
    }

    public function sale($param){
	    $cart = CardFlex::sale($param);
	    $object = json_decode(json_encode($cart), FALSE);

    return $object ;

    }

    public function create_customer($param){
        $cart = CardFlex::vault_create($param);
        $object = json_decode(json_encode($cart), FALSE);

    return $object ;

    }

    public function ask($param){
        $cart = CardFlex::query($param);
        $xml = simplexml_load_string($cart);
        $object = json_decode(json_encode($xml), FALSE);

    return $object;

    }

    public function receipt($param, $organization){
        setlocale(LC_MONETARY,"en_US");
        $user = Auth::user();


        $query = array(
            'report_type'       => 'customer_vault',
            'customer_vault_id' => $user->customer_id
        );
        $payment = new Payment;
        $vault =  json_decode(json_encode($payment->ask($query)),false);

        //convert object to array
        $data = json_decode(json_encode($param),false);
        //clean duplicates from array
        $organization = array_unique($organization);
        //cart content
        $items = Cart::contents();

        $data = array('data'=>$data,'vault'=>$vault,'products'=>$items);

        Mail::send('emails.receipt.default', $data, function($message) use ($user, $organization)
        {
            $message->to($user->email, $user->firstname.' '.$user->lastname)
                    ->subject('Purchased Receipt');

            foreach($organization as $org){
                $organization = Organization::find($org);
                $message->to($organization->email, $organization->name)
                    ->subject('Purchased Receipt - Copy');
            }
        });

    return ;

    }

}