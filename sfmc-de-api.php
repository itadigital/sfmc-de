<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://mc-sc7jp15w47twh8j85754875m4.auth.marketingcloudapis.com/v2/token';
//If will be easier to construct request as object and then convert to String.
$jsonData = array('grant_type' => 'client_credentials', 
                  'client_id' => '3z8wse7eiggnaggips7uihso', 
                  'client_secret' => 'nD0lGBUZWg5K7Oee4RZS5VEe');

//Initiate cURL.
$ch = curl_init($url);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
$result = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Request Error:' . curl_error($ch);
}
//print_r($result);

$json = json_decode($result);

print($json); 
/*
$url = 'https://mc-sc7jp15w47twh8j85754875m4.rest.marketingcloudapis.com/data/v1/async/dataextensions/key:4D5C02A7-F9C4-4027-9060-56C6D08F4432/rows';
//If will be easier to construct request as object and then convert to String.
$jsonData = array("items" => array(
                    "WelcomeSent" => false,
                    "Touchpoint1Triggered" => false,
                    "Touchpoint1Sent" => false,
                    "Touchpoint2Triggered" =>false,
                    "Touchpoint2Sent" => false,
                    "Touchpoint3Triggered" => false,
                    "Touchpoint3Sent" => false,
                    "FirstName" => "Chris",
                    "LastName" => "Saldanha",
                    "SubscriberKey" => "987654321",
                    "EmailAddress" => "cs.saldanha@gmail.com"
                 ));

//Initiate cURL.
$ch = curl_init($url);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
$auth_bear = "Authorization: Bearer " . $json[0];
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', '$auth_bear'));

//Execute the request
$result = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Request Error:' . curl_error($ch);
}
print_r($result);
*/
?>