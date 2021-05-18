<?php
header("Access-Control-Allow-Origin: *");
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

curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    
//Execute the request
$result = curl_exec($ch);
if(curl_errno($ch)){
    $sfmc_at = 'Request Error:' . curl_error($ch);
}
//print_r($result);

$resultArray = json_decode($result, true);

if (array_key_exists('access_token', $resultArray)) {
    $sfmc_at = $resultArray['access_token'];
} else {
    $sfmc_at = "Can't find access token";
}
?>