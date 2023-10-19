<?php

namespace Model;

use Traversable;

class ShipCollection implements \ArrayAccess, \IteratorAggregate
{
    private $ships;
    public function __construct(array $ships){
        $this->ships= $ships;
    }

    /**
     * @param $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset,$this->ships);
    }

    /**
     * @param $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->ships[$offset];
    }

    /**
     * @param $offset
     * @param $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        $this->ships[$offset] = $value;
    }

    /**
     * @param $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
       unset($this->ships[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->ships);
    }
    public function removeAllBrokenShips(){
        foreach ($this->ships as $key => $ship ){
            if(!$ship->isFunctional){
                unset($this->ships[$key]);
            }
        }
    }
}