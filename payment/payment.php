<?php

	session_start();


// Sandbox
$host = 'https://api.sandbox.paypal.com';
$clientId = 'AezwlxAiACmf3VH-8IjA2o9B7rdIy6XKQi5D_qZspFP9JXvuHQVZGGj6XhvE';
$clientSecret = 'EFUIWxDiKPuv_PcyHEWHq83iCko5xOvAkt7x-TaJdJPT1QMn8dRFwbSe1Jo5';
$token = '';

//Payment Info

if(isset($_GET['cardType'])) {
        $cardType = $_GET['cardType'];
    }
if(isset($_GET['cardNumber'])) {
        $cardNumber = $_GET['cardNumber'];
    }
if(isset($_GET['cardName'])) {
        $cardName = $_GET['cardName'];
        $cardName = explode(" ", $cardName);
    }
if(isset($_GET['expMonth'])) {
        $expMonth = $_GET['expMonth'];
    }
if(isset($_GET['expYear'])) {
        $expYear = $_GET['expYear'];
    }
 if(isset($_GET['cardCode'])) {
        $cardCode = $_GET['cardCode'];
    }

 if(isset($_GET['cartTotal'])) {
        $cartTotal = $_GET['cartTotal'];
    }



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
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			$_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
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
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);

	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			$_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
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
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			$_SESSION["paymentMessage"] = "Your payment couldn't be processed at this time. Please check your information and try again.";
			die();
	    }
	}

	// Convert the result from JSON format to a PHP array 
	$jsonResponse = json_decode($response, TRUE);
	return $jsonResponse;
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
						'expire_month' => $expMonth,
						'expire_year' => $expYear,
						'cvv2' => $cardCode,
						'first_name' => $cardName[0],
						'last_name' => $cardName[1]
						)
					))
			),
		'transactions' => array (array(
				'amount' => array(
					'total' => $cartTotal,
					'currency' => 'USD'
					),
				'description' => 'payment by a credit card using a test script'
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

header('Location: results.php');

?>