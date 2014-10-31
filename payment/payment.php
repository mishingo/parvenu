<?php

// Sandbox
$host = 'https://api.sandbox.paypal.com';
$clientId = 'AezwlxAiACmf3VH-8IjA2o9B7rdIy6XKQi5D_qZspFP9JXvuHQVZGGj6XhvE';
$clientSecret = 'EFUIWxDiKPuv_PcyHEWHq83iCko5xOvAkt7x-TaJdJPT1QMn8dRFwbSe1Jo5';
$token = '';

//Payment Info

//Payment Info

if(isset($_GET['cardType'])) {
        $cardType = $_GET['cardType'];
        echo $cardType;
        echo "\r\n";
        ?>
        <br />
        <?php
    }
if(isset($_GET['cardNumber'])) {
        $cardNumber = $_GET['cardNumber'];
        echo $cardNumber;
        echo "\r\n";
        ?>
        <br />
        <?php
    }
if(isset($_GET['cardName'])) {
        $cardName = $_GET['cardName'];
        $cardName = explode(" ", $cardName);
        echo $cardName[0];
        echo "\r\n";
        ?>
        <br />
        <?php
        echo $cardName[1];
        echo "\r\n";
        ?>
        <br />
        <?php
    }
if(isset($_GET['expMonth'])) {
        $expMonth = $_GET['expMonth'];
        echo $expMonth;
        echo "\r\n";
        ?>
        <br />
        <?php
    }
if(isset($_GET['expYear'])) {
        $expYear = $_GET['expYear'];
        echo $expYear;
        echo "\r\n";
        ?>
        <br />
        <?php
    }
 if(isset($_GET['cardCode'])) {
        $cardCode = $_GET['cardCode'];
        echo $cardCode;
        echo "\r\n";
        ?>
        <br />
        <?php
    }

 if(isset($_GET['cartTotal'])) {
        $cartTotal = $_GET['cartTotal'];
        echo $cartTotal;
        echo "\r\n";
        ?>
        <br /> <br />
        <?php
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
#	curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
		echo "Time took: " . $info['total_time']*1000 . "ms\n";
		?> <br /> <?php
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			echo "Received error: " . $info['http_code']. "\n";
			?> <br /> <?php
			echo "Raw response:".$response."\n";
			?> <br /> <?php
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
	#curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
		echo "Time took: " . $info['total_time']*1000 . "ms\n";
		?> <br /> <?php

	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			echo "Received error: " . $info['http_code']. "\n";
			?> <br /> <?php
			echo "Raw response:".$response."\n";
			?> <br /> <?php
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
	
	#curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
	$response = curl_exec( $curl );
	if (empty($response)) {
	    // some kind of an error happened
	    die(curl_error($curl));
	    curl_close($curl); // close cURL handler
	} else {
	    $info = curl_getinfo($curl);
		echo "Time took: " . $info['total_time']*1000 . "ms\n";
		?> <br /> <?php
	    curl_close($curl); // close cURL handler
		if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
			echo "Received error: " . $info['http_code']. "\n";
			?> <br /> <?php
			echo "Raw response:".$response."\n";
			?> <br /> <?php
			die();
	    }
	}

	// Convert the result from JSON format to a PHP array 
	$jsonResponse = json_decode($response, TRUE);
	return $jsonResponse;
}

echo "\n";
?> <br /> <?php
echo "Obtaining OAuth2 Access Token.... \n";
?> <br /> <?php


$url = $host.'/v1/oauth2/token'; 
$postArgs = 'grant_type=client_credentials';
$token = get_access_token($url,$postArgs);


echo "Got OAuth Token: ".$token;
?> <br /> <?php
echo "\n \n";
?> <br /> <?php
?> <br /> <?php
echo "Making a Credit Card Payment... \n";
?> <br /> <?php


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
$json_resp = make_post_call($url, $json);
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

echo "Payment Created successfully: " . $json_resp['id'] ." with state '". $json_resp['state']."'\n";
?> <br /> <?php
echo "Payment related_resources:". $related_resource_count . "(". $related_resources.")";
?> <br /> <?php
echo "\n \n";
?> <br /> <?php
?> <br /> <?php
echo "Obtaining Payment Details... \n";
?> <br /> <?php
$json_resp = make_get_call($payment_detail_url);
echo "Payment details obtained for: " . $json_resp['id'] ." with state '". $json_resp['state']. "'";
?> <br /> <?php
echo "\n \n";
?> <br /> <?php
?> <br /> <?php
echo "Obtaining Sale details...\n";
?> <br /> <?php
$json_resp = make_get_call($sale_detail_url);
echo "Sale details obtained for: " . $json_resp['id'] ." with state '". $json_resp['state']."'";
?> <br /> <?php
echo "\n \n";


?>