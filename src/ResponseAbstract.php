<?php


namespace carono\turbotext;


class ResponseAbstract extends ArrayObject
{
    protected $_responseClasses = ['folders' => 'carono\turbotext\response\FolderResponse'];
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