<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class ResponseAbstract extends ClassGenerator
{
    protected function formExtends()
    {
        return 'carono\turbotext\ResponseAbstract';
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
        if (isset($this->params['result'])) {
            $element = new self();
            $params = $this->params['result'];
            $params['name'] = $this->params['name'];
            $element->renderToFile($params);
            return [
                $this->params['name'] => [
                    'comment' => [
                        $this->params['description'],
                        '@var ' . str_replace('sResponse', 'Response', $this->formClassName()) . '[]'
                    ]
                ]
            ];
        } else {
            $properties = [];
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
            return $properties;
        }
    }

}