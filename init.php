<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('sdk/ET_Client.php');
$client = new ET_Client();
$request = new ET_List();
$request->authStub = $client;
$response = $request->get();
print_r($response);

?>