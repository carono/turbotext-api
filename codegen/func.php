<?php

function parseParamsFromQuery($query)
{
    $params = [];
    foreach ($query as $param) {
        if ($parsedParam = parseParams(pq($param)->text())) {
            $params[] = $parsedParam;
        }
    }
    return $params;
}

function clearFolder($folder)
{
    $files = glob(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . '*');
    foreach ($files as $file) {
        if (is_file($file)) {
            @unlink($file);
        }
    }
}

function stripAndWordWrap($str)
{
    return wordwrap(stripSpaces($str), 180) . "\n";
}

function formParamLine($param)
{
    return '**' . $param['name'] . "** ({$param['type']}) - " . stripLines($param['description']);
}

function stripSpaces($str)
{
    $str = preg_replace('/[\s]{2,}/', " ", $str);
    return $str;
}

function stripLines($str)
{
    $str = str_replace("\n", " ", $str);
    $str = stripSpaces($str);
    return $str;
}

function formMethodName($str)
{
    $arr = array_filter(explode('_', $str));
    $arr = array_map('ucfirst', $arr);
    $arr[0] = lcfirst($arr[0]);
    return join('', $arr);
}

function formClassName($str, $clear = ['get_', '_array'])
{
    foreach ($clear as $item) {
        $str = str_ireplace($item, '', $str);
    }
    $arr = array_filter(explode('_', $str));
    $arr = array_map('ucfirst', $arr);
    return join('', $arr);
}

function formParamType($str)
{
    switch ($str) {
        case 'text':
            return 'string';
            break;
        case 'date':
            return 'string Y-m-d';
            break;
        case 'datetime':
            return 'string Y-m-d H:i:s';
            break;
    }
    return $str;
}

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
    if ($uls->count() == 1 && strpos($tdHtml, 'Каждый элемент') !== false) {
        if (preg_match('/<td>(.)+<ul>/s', $tdHtml, $m)) {
            $ul = "<ul><li>" . trim(strip_tags($m[0])) . "</li></ul>";
            $uls = pq("<td>$ul{$uls->eq(0)->htmlOuter()}</td>")->find('ul');
        }
    }
    $count = $uls->count();
    $parsing = parseParamsFromQuery($uls->eq($count == 2 ? 1 : 0)->find('li'));
    if ($count == 2) {
        $returnParam = parseParams($uls->eq(0)->text());
        $returnParam['result'] = $parsing;
        return [$returnParam];
    } else {
        return $parsing;
    }
}

function asTable($array)
{
    $header = array_shift($array);
    $content = "\n\n|" . join("|", $header) . "\n";
    $content .= preg_replace('/[^\|]/iu', '-', trim($content)) . "\n";
    foreach ($array as $key => $columns) {
        $content .= "|" . join("|", $columns) . "\n";
    }
    return $content;
}

function asHeader($string)
{
    return "\n\n" . $string . "\n" . str_repeat('=', mb_strlen($string, 'utf-8')) . "\n";
}

function asCode($code)
{
    return "`$code`";
}