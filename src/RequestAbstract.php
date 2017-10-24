<?php


namespace carono\turbotext;


abstract class RequestAbstract
{
    protected $_client;

    /**
     * RequestAbstract constructor.
     *
     * @param ClientAbstract $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * @return ClientAbstract
     */
    public function getClient()
    {
        return $this->_client;
    }
}