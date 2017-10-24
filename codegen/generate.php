<?php

require '../vendor/autoload.php';
require 'ClientAbstract.php';
require 'RequestAbstract.php';

use GuzzleHttp\Client;
use carono\turbotext\codegen\ClientAbstract;

function parseParams($str)
{
    if (preg_match('/^(\w+)\s+\((\w+)\)\s+-\s+(.+)/uis', $str, $m)) {
        return [
            'name' => $m[1],
            'type' => $m[2],
            'description' => $m[3],
            'required' => mb_strpos($m[3], 'Необязательный', 0, 'utf-8') === false
        ];
    } else {
        return [];
    }
}

function parseReturns($tdHtml)
{
    $uls = pq($tdHtml)->find('ul');
    $returns = [];
    if ($uls->count() == 1 && strpos($tdHtml, 'Каждый элемент') !== false) {
        if (preg_match('/<td>(.)+<ul>/s', $tdHtml, $m)) {
            $ul = "<ul><li>" . trim(strip_tags($m[0])) . "</li></ul>";
            $uls = pq("<td>$ul{$uls->eq(0)->htmlOuter()}</td>")->find('ul');
        }
    }
    if ($uls->count() == 2) {
        $returnParam = parseParams($uls->eq(0)->text());
        $result = [];
        foreach ($uls->eq(1)->find('li') as $param) {
            if ($parsedParam = parseParams(pq($param)->text())) {
                $result[] = $parsedParam;
            }
        }
        $returnParam['result'] = $result;
        $returns[] = $returnParam;
    } else {
        foreach ($uls->eq(0)->find('li') as $param) {
            if ($parsedParam = parseParams(pq($param)->text())) {
                $returns[] = $parsedParam;
            }
        }
    }
    return $returns;
}

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
        $params = [];
        foreach ($tr->find('td')->eq(2)->find('li') as $param) {
            if ($parsedParam = parseParams(pq($param)->text())) {
                $params[] = $parsedParam;
            }
        }
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
};

$abstractClient = new ClientAbstract();
$abstractClient->renderToFile($data);