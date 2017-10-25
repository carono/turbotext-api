<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class RequestAbstract extends ClassGenerator
{
    protected function formExtends()
    {
        return 'carono\turbotext\RequestAbstract';
    }

    protected function formClassName()
    {
        return ucfirst($this->params['name']) . 'Request';
    }

    protected function formClassNamespace()
    {
        return 'carono\turbotext\request';
    }

    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'request' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    protected static function formMethodName($str)
    {
        $arr = array_filter(explode('_', $str));
        $arr = array_map('ucfirst', $arr);
        $arr[0] = lcfirst($arr[0]);
        return join('', $arr);
    }

    public function methods()
    {
        foreach ($this->params['methods'] as $methodData) {
            $methodName = self::formMethodName($methodData['name']);
            $method = $this->phpClass->addMethod($methodName);
            $method->addComment(trim($methodData['description']));
            $params = [];
            $params['action'] = $methodData['name'];

            if (count($methodData['params']) > 4) {

            } else {
                foreach ($methodData['params'] as $param) {
                    $type = formParamType($param['type']);
                    $method->addComment("@param {$type} \${$param['name']} {$param['description']}");
                    $params[$param['name']] = '$' . $param['name'];
                    if ($param['required']) {
                        $method->addParameter($param['name']);
                    } else {
                        $method->addParameter($param['name'], null);
                    }
                }
            }
            $response = new ResponseAbstract();
            if (isset($methodData['returns'][0]['result'])) {
                $response->renderToFile($methodData['returns'][0]);
                $className = $response->formClassNamespace() . '\\' . $response->formClassName();
            } elseif ($methodData['returns']) {
                $methodData['returns']['name'] = $methodData['name'];
                $response->properties['asd'] = 213;
                $response->renderToFile($methodData['returns']);
                $className = $response->formClassNamespace() . '\\' . $response->formClassName();
            } else {
                $className = 'carono\turbotext\Response';
            }
            $method->addComment("@return \\$className|string|\stdClass|\SimpleXMLElement");
            $paramsStr = self::arrayAsPhpVar($params);
            $body = <<<PHP
\$params = $paramsStr;            
return \$this->getClient()->getContent('api', \$params, '$className');
PHP;
            $method->addBody($body);
        }
        return false;
    }

    protected function arrayAsPhpVar($array)
    {
        $export = [];
        foreach ($array as $key => $value) {
            $export[] = "'$key' => " . (strpos($value, '$') === false ? "'$value'" : $value);
        }
        $export = join(",\n\t", $export);
        if ($array) {
            $result = "[\n\t$export\n]";
        } else {
            $result = "[]";
        }
        return $result;
    }
}