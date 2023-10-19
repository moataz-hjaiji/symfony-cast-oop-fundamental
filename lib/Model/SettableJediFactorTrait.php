<?php

namespace Model;

trait SettableJediFactorTrait
{
    private $jediFactor;

    /**
     * @inheritDoc
     */
    public function getJediFactor()
    {
        return $this->jediFactor;
    }
    public function setJedtFactor($value){
        $this->jediFactor = $value;
    }
}