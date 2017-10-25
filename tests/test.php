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
$folder = $folders->folders;
//$folder->
print_r($folder);
//$x = $result->folders;
//print_r($x[1]->name);
//print_r($result->blocked_money);
