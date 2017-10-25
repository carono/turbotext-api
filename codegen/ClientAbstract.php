<?php

namespace carono\turbotext\codegen;

use carono\codegen\ClassGenerator;

class ClientAbstract extends ClassGenerator
{
    protected function formExtends()
    {
        return 'carono\rest\Client';
    }

    protected function formClassName()
    {
        return 'ClientAbstract';
    }

    protected function formClassNamespace()
    {
        return 'carono\turbotext';
    }

    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    public function methods()
    {
        $this->phpClass->setAbstract(true);
        foreach ($this->params as $section) {
            $sectionRequest = new RequestAbstract();
            $sectionRequest->renderToFile($section);
            $className = "\\" . $sectionRequest->formClassNamespace() . "\\" . $sectionRequest->formClassName();
            $method = $this->phpClass->addMethod($section['name']);
            $body = <<<PHP
return (new $className(\$this));
PHP;
            $method->addBody($body);
            $method->addComment($section['description']);
            $method->addComment("");
            $method->addComment("@return $className");
        }
        file_put_contents('data.json', json_encode($this->params));
        return false;
    }
}