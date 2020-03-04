<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class ResponseAbstract extends ClassGenerator
{
    public $properties = [];

    protected function formExtends()
    {
        if (strpos($this->formClassName(), 'ElementResponse')) {
            return 'carono\turbotext\ArrayObject';
        }

        return 'carono\turbotext\ResponseAbstract';
    }

    protected function formClassName()
    {
        $name = $this->params['name'];
        $name = formClassName($name);
        if (!isset($this->params['result']) && substr($name, -1, 1) == 's') {
            $name = substr($name, 0, -1) . 'Element';
        }
        return $name . 'Response';
    }

    protected function formClassNamespace()
    {
        return 'carono\turbotext\response';
    }

    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'response' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    protected function classProperties()
    {
        $properties = [];
        if (isset($this->params['result'])) {
            $properties = [
                '_responseClasses' => [
                    'value' => [],
                    'visibility' => 'protected'
                ]
            ];
            $element = new self();
            $params = $this->params['result'];
            $params['name'] = $this->params['name'];
            $element->renderToFile($params);
            $varClass = $element->formClassName();
            $properties['_responseClasses']['value'][$this->params['name']] = 'carono\turbotext\response\\' . $varClass;
            $properties[$this->params['name']] = [
                'value' => [],
                'comment' => [
                    stripAndWordWrap($this->params['description']),
                    "@var {$varClass}[]"
                ]
            ];
        } else {
            foreach ($this->params as $param) {
                if (is_string($param)) {
                    continue;
                }
                $properties[$param['name']] = [
                    'comment' => [
                        stripAndWordWrap($param['description']),
                        '@var ' . formParamType($param['type'])
                    ]
                ];
            }
        }
        return $properties;
    }

}