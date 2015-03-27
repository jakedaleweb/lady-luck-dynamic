<?php

// Create new request object
$request = new PxPayRequest();

// Prepare a URL to come back to once payment has been made
$http_host 		 = getenv("HTTP_HOST");
$request_uri 	 = getenv("SCRIPT_NAME");
$urlToComeBackTo = "http://".$http_host.$request_uri;

// Settings for the transaction
// Variable to hold the grand total
$grandTotal = 0;
// Loop through each item and add the total cost to grand total
foreach( $_SESSION['cart'] as $item ) {
	$grandTotal += $item['quantity'] * $item['price'];
}

$request->setAmountInput($grandTotal);
$request->setTxnType( 'Purchase' );
$request->setCurrencyInput( 'NZD' );
$request->setUrlFail( $urlToComeBackTo );
$request->setUrlSuccess( $urlToComeBackTo );
$request->setTxnData1( $_POST['orderName'] );
$request->setTxnData2( $_POST['orderAddress'] );
$request->setTxnData3( $_POST['orderEmail'] );

// echo '<pre>';
// print_r($request);
// die('test');
// Convert the request into XML
$request_string = $pxpay->makeRequest($request);

// Send the request
$response = new MifMessage($request_string);

// Recieve a response with secure URL to go to for payment
$urlToPaymentGateway = $response->get_element_text("URI");

// Redirect the visitor to paymentexpress
header('Location: '.$urlToPaymentGateway);