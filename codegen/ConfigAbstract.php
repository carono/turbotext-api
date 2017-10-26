<?php

namespace carono\turbotext\codegen;


use carono\codegen\ClassGenerator;

class ConfigAbstract extends ClassGenerator
{
    protected function formExtends()
    {
        return 'carono\turbotext\ConfigAbstract';
    }

    protected function formClassName()
    {
        return formClassName($this->params['name']) . 'Config';
    }

    protected function formClassNamespace()
    {
        return 'carono\turbotext\config';
    }

    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    protected function classProperties()
    {
        $properties = [];
        foreach ($this->params['params'] as $param) {
            if (is_string($param)) {
                continue;
            }
            $properties[$param['name']] = [
                'comment' => [
                    stripAndWordWrap(stripSpaces($param['description'])),
                    '@var ' . formParamType($param['type'])
                ]
            ];
        }
        return $properties;
    }
}