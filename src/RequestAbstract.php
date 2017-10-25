<?php


namespace carono\turbotext;


abstract class RequestAbstract
{
    protected $_client;

    /**
     * RequestAbstract constructor.
     *
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->_client;
    }
}