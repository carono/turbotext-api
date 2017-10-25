<?php


namespace carono\turbotext;


class ResponseAbstract extends ArrayObject
{
    /**
     * @var boolean
     */
    public $success;
    /**
     * @var string
     */
    public $errors;


    /**
     * @param $property
     * @return mixed|null
     */
    public function getResponseClass($property)
    {
        return isset($this->_responseClasses[$property]) ? $this->_responseClasses[$property] : null;
    }
}