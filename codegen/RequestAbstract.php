<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class RequestAbstract extends ClassGenerator
{
    /**
     * @return string
     */
    protected function formExtends()
    {
        return 'carono\turbotext\RequestAbstract';
    }

    /**
     * @return string
     */
    protected function formClassName()
    {
        return ucfirst($this->params['name']) . 'Request';
    }

    /**
     * @return string
     */
    protected function formClassNamespace()
    {
        return 'carono\turbotext\request';
    }

    /**
     * @return string
     */
    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'request' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    /**
     * @return bool
     */
    public function methods()
    {
        foreach ($this->params['methods'] as $methodData) {
            $methodName = formMethodName($methodData['name']);
            $method = $this->phpClass->addMethod($methodName);
            $method->addComment(stripAndWordWrap($methodData['description']));
            $params = [];
            $params['action'] = $methodData['name'];
            if (count($methodData['params']) > 4) {
                $config = new ConfigAbstract();
                $config->renderToFile($methodData);
                $className = '\\' . $config->formClassNamespace() . '\\' . $config->formClassName();
                $method->addParameter('config');
                $method->addComment("@param $className|array \$config");

                $body = <<<PHP
foreach ((\$config instanceof \carono\\turbotext\ConfigAbstract ? \$config->toArray() : \$config) as \$key => \$value) {
    \$params[\$key] = \$value;
}
PHP;
                $paramsStr = self::arrayAsPhpVar($params);
                $method->addBody("\$params = $paramsStr;");
                $method->addBody($body);
            } else {
                foreach ($methodData['params'] as $param) {
                    $type = formParamType($param['type']);
                    $description = trim(stripAndWordWrap($param['description']));
                    $method->addComment("@param {$type} \${$param['name']} {$description}");
                    $params[$param['name']] = '$' . $param['name'];
                    if ($param['required']) {
                        $method->addParameter($param['name']);
                    } else {
                        $method->addParameter($param['name'], null);
                    }
                }
                $paramsStr = self::arrayAsPhpVar($params);
                $method->addBody("\$params = $paramsStr;");
            }
            $response = new ResponseAbstract();
            if (isset($methodData['returns'][0]['result'])) {
                $returns = $methodData['returns'][0];
                $response->renderToFile($returns);
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
            $method->addBody("return \$this->getClient()->getContent('api', \$params, '$className');");
        }
        return false;
    }

    protected static function arrayAsPhpVar($array)
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