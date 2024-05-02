<?php

namespace Dots;

use Dots\Exception\InvalidArgumentException;

abstract class DotsObject implements \ArrayAccess, \Countable, \JsonSerializable
{

    /**
     * @param $offset
     * @return bool
     */
    public function offsetExists(mixed $offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @param $offset
     * @param $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param $offset
     * @return void
     */
    public function offsetUnset(mixed $offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * @return int
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    abstract public static function fromArray(array $array): DotsObject;
}
