<?php

require('sdk/ET_Client.php');
$client = new ET_Client();
$request = new ET_List();
$request->authStub = $client;
$response = $request->get();
print_r($response);

?>