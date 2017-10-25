<?php
require '../vendor/autoload.php';
require '../src/Client.php';
require '../src/request/OrderRequest.php';

use \carono\turbotext\Client;

$client = new Client();
$client->apiKey = '';
//$balance = $client->order()->getBalance();
//print_r($balance);
$folders = $client->order()->getFolders();
$folder = $folders->folders[0];
print_r($folder->name);
//print_r($folders);
