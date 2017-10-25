<?php
require '../vendor/autoload.php';
require '../src/Client.php';
require '../src/request/OrderRequest.php';

use \carono\turbotext\Client;
use carono\turbotext\config\OrderConfig;

$client = new Client();
$client->apiKey = '';
//$client->setGuzzleOptions(['proxy' => 'tcp://localhost:8888']);
//$balance = $client->order()
//
//->getBalance();
//print_r($balance);
//$folders = $client->order()->getFolders();
//$folder = $folders->folders[0];
//print_r($folder->name);
$config = new OrderConfig();
$config->order_title = 'test';
$config->order_type = 1;
$config->folder_id = 0;
$config->order_description = 'desc';
$config->order_text = 'order_text';
$config->order_size_from = 500;
$config->order_size_to = 600;
$config->order_price = 30;

$result = $client->order()->createOrder($config);

print_r($result);
