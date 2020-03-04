<?php

require '../vendor/autoload.php';
require 'ClientAbstract.php';
require 'RequestAbstract.php';
require 'ResponseAbstract.php';
require 'ConfigAbstract.php';
require 'func.php';

use carono\turbotext\codegen\ClientAbstract;
use GuzzleHttp\Client;

clearFolder('config');
clearFolder('request');
clearFolder('response');

$sections = [
    'api1' => 'order',
    'api2' => 'user',
    'api3' => 'microTask',
    'api4' => 'message',
];
$apidoc = 'apidoc.html';
if (file_exists($apidoc)) {
    $content = file_get_contents($apidoc);
} else {
    $content = (new Client())->get('https://www.turbotext.ru/api-info/')->getBody()->getContents();
    file_put_contents($apidoc, $content);
}
$query = \phpQuery::newDocumentHTML($content);
$data = [];
$i = 1;
foreach ($desc = $query->find('.api_descr') as $desc) {
    $h3 = pq($desc)->prev('h3')->text();
    $item = [
        'name' => $sections['api' . $i++],
        'description' => $h3,
        'methods' => []
    ];
    foreach (pq($desc)->find('table tr') as $tr) {
        $tr = pq($tr);
        if (!$name = trim($tr->find('td')->eq(0)->text())) {
            continue;
        }
        $params = parseParamsFromQuery($tr->find('td')->eq(2)->find('li'));

        $returns = parseReturns($uls = $tr->find('td')->eq(3)->htmlOuter());
        $method = [
            'name' => $name,
            'description' => $tr->find('td')->eq(1)->text(),
            'params' => $params,
            'returns' => $returns
        ];
        $item['methods'][] = $method;
    }
    $data[] = $item;
}
file_put_contents('data.json', json_encode($data));
$abstractClient = new ClientAbstract();
$abstractClient->renderToFile($data);