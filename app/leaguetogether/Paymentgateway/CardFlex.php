<?php namespace leaguetogether\Paymentgateway;

use Redirect;
use Cart;
use Auth;
use Response;

class CardFlex{

	
	public function flex($param, $type){

		$fee = (Cart::total() / getenv("SV_FEE")) - Cart::total() ;
		$total = $fee + Cart::total();
		$user =Auth::user();
		$charged = array(
					'subtotal'	=>$total-$fee, 
					'fee'		=>$fee,
					'total'		=>$total
		);

		$credentials = array(
						'username'	=>getenv("CF_NAME"),
						'password'	=> getenv("CF_PASS"),
						'amount' 	=> $total,
						'email'		=> $user->email,
						'phone'		=> $user->mobile,
						'orderdescription'	=> 'item description',
		);


		$merge = array_merge($type,$credentials,$param);
		$params = http_build_query($merge) . "\n";
		$uri = "https://secure.cardflexonline.com/api/transact.php";
		$ch = curl_init($uri);
		curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER  =>true,
		CURLOPT_VERBOSE     => 1,
		CURLOPT_POSTFIELDS =>$params
		));
		$out = curl_exec($ch) or die(curl_error());
		parse_str($out, $output);
		curl_close($ch);
		$response = array_merge_recursive($output,$charged);
		
		// dd($object->with('summary', array('total'=>$total,'services_fee'=>$fee)));
		// exit();
		return $response;

	}
	

	public function sale($param){

		$type = array('type'=> 'sale');
		$transaction = CardFlex::flex($param, $type);
		return  $transaction;
		
	}

	public function authorization($param){
		return $reponse;
	}

	public function capture($param){
		return $reponse;
	}

	public function void($param){
		return $reponse;
	}

	public function refund($param){
		return $reponse;
	}

	public function credit($param){
		return $reponse;
	}

	public function update($param){
		return $reponse;
	}

	


};