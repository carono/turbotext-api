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

    public function toArray()
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        foreach ((new \ReflectionClass($this))->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $result[$property->name] = $this->{$property->name};
        }
        return $result;
    }
}