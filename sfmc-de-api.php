<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://mc-sc7jp15w47twh8j85754875m4.auth.marketingcloudapis.com//v2/token';
$data = array('grant_type' => 'client_credentials', 'client_id' => '3z8wse7eiggnaggips7uihso', 'client_secret' => 'nD0lGBUZWg5K7Oee4RZS5VEe');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-Type: application/json",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);
?>