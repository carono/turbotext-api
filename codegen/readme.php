<?php
require 'func.php';

$data = json_decode(file_get_contents('data.json'), true);
$content = <<<HTML
[![Latest Stable Version](https://poser.pugx.org/carono/turbotext-api/v/stable)](https://packagist.org/packages/carono/turbotext-api)
[![Total Downloads](https://poser.pugx.org/carono/turbotext-api/downloads)](https://packagist.org/packages/carono/turbotext-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/carono/turbotext-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/carono/turbotext-api/?branch=master)
HTML;


$content .= asHeader('Введение');
$content .= <<<HTML
Данный клиент разработан для работы с сайтом https://www.turbotext.ru.  
Класс клиента генерируется автоматически на основе документации https://www.turbotext.ru/api-info/  
Разработано по заказу https://bonica.pro
HTML;


$content .= asHeader('Инсталяция');
$content .= asCode('composer require carono/turbotext-api');
$content .= asHeader('Использование');
$content .= <<<HTML
```php
// Получение баланса
  
\$client = new \carono\\turbotext\Client();
\$client->apiKey = 'your-api-key';
  
\$response = \$client->order()->getBalance();
  
// Создание заказа
  
\$config = new OrderConfig();
\$config->order_title = 'Заголовок';
\$config->order_type = 1;
\$config->folder_id = 0;
\$config->order_description = 'Описание';
\$config->order_text = 'Текст';
\$config->order_size_from = 500;
\$config->order_size_to = 600;
\$config->order_price = 30;
  
\$response = \$client->order()->createOrder(\$config);
```
HTML;

$description = [
    ['Метод', 'Описание']
];
$sectionData = [];
foreach ($data as $section) {
    $description[] = [
        '$client->' . $section['name'] . '()',
        $section['description']
    ];
    $sectionData[] = asHeader($section['description']);
    $sectionData[] = <<<HTML
```php
\$client->{$section['name']}();
```
HTML;

    $methods = [
        ['Метод', 'Описание', 'Входные данные', 'Выходные данные']
    ];

    foreach ($section['methods'] as $method) {
        $results = [];
        $params = [];
        foreach ($method['returns'] as $result) {
            $results[] = formParamLine($result);
            if (isset($result['result'])) {
                foreach ($result['result'] as $res) {
                    $results[] = formParamLine($res);
                }
            }
        }
        if (isset($method['params'])) {
            foreach ($method['params'] as $param) {
                $params[] = '**' . $param['name'] . "** ({$param['type']}) - " . stripLines($param['description']);
            }
        }

        $methods[] = [
            formMethodName($method['name']),
            stripLines($method['description']),
            join('<br /><br />', $params),
            join('<br /><br />', $results),
        ];
    }
    $sectionData[] = asTable($methods);
}
$content .= asTable($description);

foreach ($sectionData as $sectionDatum) {
    $content .= $sectionDatum;
}

$content .= asHeader('Внимание');
$content .= <<<HTML
На данный момент, не все методы были проверены на работоспособность, а так же нет автоматических тестов для проверки.  
До выходи релиза 1.0.0, работа клиента не гарантируется.
HTML;


file_put_contents('../README.md', trim($content));

