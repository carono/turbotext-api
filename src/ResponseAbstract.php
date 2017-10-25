<?php


namespace carono\turbotext;


class ResponseAbstract extends \ArrayObject
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
     * ResponseAbstract constructor.
     *
     * @param array $input
     */
    public function __construct($input = [])
    {
        parent::__construct($input, self::ARRAY_AS_PROPS, "ArrayIterator");
    }
}