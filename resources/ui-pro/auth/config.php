<?php require 'vendor/autoload.php';
$clientID = ""; // copy dari Google Cloud API (OAuth client ID)
$clientSecret = ""; // copy dari Google Cloud API (OAuth client ID)

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope('profile');
$client->addScope('email');
