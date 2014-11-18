<?php

	session_start();


// Sandbox
$host = 'https://api.sandbox.paypal.com';
$clientId = 'AezwlxAiACmf3VH-8IjA2o9B7rdIy6XKQi5D_qZspFP9JXvuHQVZGGj6XhvE';
$clientSecret = 'EFUIWxDiKPuv_PcyHEWHq83iCko5xOvAkt7x-TaJdJPT1QMn8dRFwbSe1Jo5';
$token = '';


//Functions

function get_access_token($url, $postdata) {
	global $clientId, $clientSecret;
	$curl = curl_init($url); 
	curl_setopt($curl, CURLOPT_POST, true); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_USERPWD, $clientId . ":" . $clientSecret);
	curl_setopt($curl, CURLOPT_HEADER, false); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata); 
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    $_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			$_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
			header('Location: checkout.php');
			die();
	    }
	}

	// Convert the result from JSON format to a PHP array 
	$jsonResponse = json_decode( $response );
	return $jsonResponse->access_token;
}

function make_post_call($url, $postdata) {
	global $token;
	$curl = curl_init($url); 
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer '.$token,
				'Accept: application/json',
				'Content-Type: application/json'
				));
	
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata); 
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    $_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);

	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			$_SESSION["paymentMessage"] = "Your card Number may be incorrect, please try again.";
			header('Location: checkout.php');
			die();
	    }
	}

	// Convert the result from JSON format to a PHP array 
	$jsonResponse = json_decode($response, TRUE);
	return $jsonResponse;
}

function make_get_call($url) {
	global $token;
	$curl = curl_init($url); 
	curl_setopt($curl, CURLOPT_POST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer '.$token,
				'Accept: application/json',
				'Content-Type: application/json'
				));
	
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    $_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			header('Location: checkout.php');
			die();
	    }
	}

	// Convert the result from JSON format to a PHP array 
	$jsonResponse = json_decode($response, TRUE);
	return $jsonResponse;
}

//Payment Info


if(isset($_SESSION["currentuser"])){
	// saved user ###############################
	$cardNumber = $_SESSION['cardNumber'];

	$cardFName = $_SESSION['FName'];

	$cardLName = $_SESSION['LName'];

	$expire_month = $_SESSION['expire_month'];

	$expire_year = $_SESSION['expire_year'];

	$cardCode = $_SESSION['cardCode'];

} else {
	//guest %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	if(isset($_GET['cardNumber'])) {
	        $cardNumber = $_GET['cardNumber'];

	    }
	if(isset($_GET['FName'])) {
	        $cardFName = $_GET['FName'];
	        $_SESSION['FName'] = $cardFName;
	    }
	if(isset($_GET['LName'])) {
	    	$cardLName = $_GET['LName'];
	    	$_SESSION['LName'] = $cardLName;
		}
	if(isset($_GET['expire_month'])) {
	        $expire_month = $_GET['expire_month'];

	    }
	if(isset($_GET['expire_year'])) {
	        $expire_year = $_GET['expire_year'];
	        
	    }

	 if(isset($_GET['cardCode'])) {
	        $cardCode = $_GET['cardCode'];
	    }

	 //Other Info
	 if(isset($_GET['addressOne'])) {
	        $_SESSION["addressOne"] = $_GET['addressOne'];
	    } 
	  if(isset($_GET['addressTwo'])) {
	        $_SESSION["addressTwo"] = $_GET['addressTwo'];
	    } 
	 if(isset($_GET['city'])) {
	        $_SESSION["city"] = $_GET['city'];
	    } 
	 if(isset($_GET['zip'])) {
	        $_SESSION["zip"] = $_GET['zip'];
	    } 
	 if(isset($_GET['phone'])) {
	        $_SESSION["phone"] = $_GET['phone'];
	    } 
	if(isset($_GET['email'])) {
	        $_SESSION["email"] = $_GET['email'];
	    } 
}





$cartTotal = $_SESSION['cartTotal'];

$actual_link = "http://$_SERVER[HTTP_HOST]";

if(!$cartTotal){
	$_SESSION["paymentMessage"] = "There are no items in your cart.";
	header('Location: checkout.php');
}/*elseif(!$cardNumber || !$cardFName || !$expDate[0] || !$expDate[1] || !$cardCode || !$_SESSION["addressOne"] || !$_SESSION["addressTwo"] || !$_SESSION["city"] || !$_SESSION["zip"] || !$_SESSION["phone"]){
	$_SESSION["paymentMessage"] = "Please fill out all of the form areas.";
	header('Location: checkout.php');
} */else {

	$cardID = substr($cardNumber,0,1);

	if($cardID == 4){
		$cardType = 'visa';
	}elseif($cardID == 3){
		$cardType = 'amex';
	}elseif($cardID == 5){
		$cardType = 'mastercard';
	}elseif($cardID == 6){
		$cardType = 'discover';
	}else{
		$cardType = '';
	}

	//Create token call info.
	$url = $host.'/v1/oauth2/token'; 
	$postArgs = 'grant_type=client_credentials';

	//Get token
	$token = get_access_token($url,$postArgs);

	//Create payment call info.
	$url = $host.'/v1/payments/payment';
	$payment = array(
			'intent' => 'sale',
			'payer' => array(
				'payment_method' => 'credit_card',
				'funding_instruments' => array ( array(
						'credit_card' => array (
							'number' => $cardNumber,
							'type'   => $cardType,
							'expire_month' => $expire_month,
							'expire_year' => $expire_year,
							'cvv2' => $cardCode,
							'first_name' => $cardFName,
							'last_name' => $cardLName
							)
						))
				),
			'transactions' => array (array(
					'amount' => array(
						'total' => $cartTotal,
						'currency' => 'USD'
						),
					'description' => 'payment by a credit card using a test script.'
					))
			);


	$json = json_encode($payment);

	//Send payment call
	$json_resp = make_post_call($url, $json);

	//Json Response Sort.
	foreach ($json_resp['links'] as $link) {
		if($link['rel'] == 'self'){
			$payment_detail_url = $link['href'];
			$payment_detail_method = $link['method'];
		}
	}
	$related_resource_count = 0;
	$related_resources = "";
	foreach ($json_resp['transactions'] as $transaction) {
		if($transaction['related_resources']) {
			$related_resource_count = count($transaction['related_resources']);
			foreach ($transaction['related_resources'] as $related_resource) {
				if($related_resource['sale']){
					$related_resources = $related_resources."sale ";
					$sale = $related_resource['sale'];
					foreach ($sale['links'] as $link) {
						if($link['rel'] == 'self'){
							$sale_detail_url = $link['href'];
							$sale_detail_method = $link['method'];
						}else if($link['rel'] == 'refund'){
							$refund_url = $link['href'];
							$refund_method = $link['method'];
						}
					}
				} else if($related_resource['refund']){
					$related_resources = $related_resources."refund";
				}	
			}
		}
	}

	$_SESSION["paymentMessage"] = "Thank you! Your payment has been processed.";
	
	header('Location: transaction.php'); //old

}

?>