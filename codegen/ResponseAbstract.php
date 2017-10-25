<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class ResponseAbstract extends ClassGenerator
{
    public $properties = [];

    protected function formExtends()
    {
        if (!isset($this->params['result'])) {
            return 'carono\turbotext\ArrayObject';
        } else {
            return 'carono\turbotext\ResponseAbstract';
        }
    }

    protected function formClassName()
    {
        $name = $this->params['name'];
        $clear = [
            'get_',
            'create_',
            '_array'
        ];
        foreach ($clear as $item) {
            $name = str_ireplace($item, '', $name);
        }
        $name = ucfirst($name);
        if (!isset($this->params['result']) && substr($name, -1, 1) == 's') {
            $name = substr($name, 0, -1);
        }

        $arr = array_filter(explode('_', $name));
        $arr = array_map('ucfirst', $arr);
        return join('', $arr) . 'Response';
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
            $varClass = str_replace('sResponse', 'Response', $this->formClassName());
            $properties['_responseClasses']['value'][$this->params['name']] = 'carono\turbotext\response\\' . $varClass;
            $properties[$this->params['name']] = [
                'value' => [],
                'comment' => [
                    $this->params['description'],
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
                        $param['description'],
                        '@var ' . formParamType($param['type'])
                    ]
                ];
            }
        }
        return $properties;
    }

}