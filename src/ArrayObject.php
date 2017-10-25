<?php


namespace carono\turbotext;


class ArrayObject extends \ArrayObject
{
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