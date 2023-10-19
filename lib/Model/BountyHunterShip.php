<?php

namespace Model;

class BountyHunterShip extends AbstractShip
{
    use SettableJediFactorTrait;
    /**
     * @inheritDoc
     */
    public function getType()
    {
        return "Bounty Hunter";
    }

    /**
     * @inheritDoc
     */
    public function isFunctional()
    {
        return true;
    }

}