<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'sfmc-de-init.php';
//echo $sfmc_at;

$url = 'https://mc-sc7jp15w47twh8j85754875m4.rest.marketingcloudapis.com/interaction/v1/events';

/*
//Get url parameters and build array
parse_str($_SERVER['QUERY_STRING'], $query_array);
//print_r($query_array);

//Construct request from query parameters (ex. ?ContactKey=1234&EventDefinitionKey=event_key)
$jsonData = array("items" => [$query_array]);
*/

//If will be easier to construct request as object and then convert to String.
$jsonData = array("items" => [array(
                    "ContactKey" => $_GET['ContactKey'],
                    "EventDefinitionKey" => $_GET['EventDefinitionKey'],
                    "Data" => [array(
                      $_GET['FilterName'] => $_GET['FilterValue']
                   )]
                 )]);

//Initiate cURL.
$ch = curl_init($url);

//print_r($jsonData);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

print_r($jsonDataEncoded);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Tell cURL that we want to send a PUT request.
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

//Attach our JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json and pass in auth
$headr = array();
$headr[] = 'Content-Type: application/json';
$headr[] = 'Authorization: Bearer ' . $sfmc_at;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

//Execute the request
$result = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Request Error:' . curl_error($ch);
} else {
    print_r($result);
}

?>
