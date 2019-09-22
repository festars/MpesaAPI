<?php
//Transaction Status API checks the status of a B2B, B2C and C2B APIs transactions.
require "access_token.php"; //access token url
$url = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';//transaction status url

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.$access_token)); //setting custom header


$curl_post_data = array(
    //Fill in the request parameters with valid values
    'Initiator' => ' ',//	The name of Initiator to initiating the request.
    'SecurityCredential' => ' ',//Base64 encoded string of the M-Pesa short code and password,
    'CommandID' => 'TransactionStatusQuery',//Unique command for each transaction type,
    'TransactionID' => ' ',//Organization Receiving the funds.
    'PartyA' => ' ',//Organization /MSISDN sending the transaction.
    'IdentifierType' => '1',//Type of organization receiving the transaction
    'ResultURL' => 'https://ip_address:port/result_url',//The path that stores information of transaction.
    'QueueTimeOutURL' => 'https://ip_address:port/timeout_url',//The path that stores information of time out transaction.
    'Remarks' => 'Checking status of this transaction'//Comments that are sent along with the transaction.
    //'Occasion' => ' '//optional
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;