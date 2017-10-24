<?php
require '../vendor/autoload.php';
require '../src/Client.php';
require '../src/request/OrderRequest.php';

use \carono\turbotext\Client;

$client = new Client();
$client->apiKey = '111111111111';
$result = $client->order()->getBalance();
print_r($result);
