<?php

namespace Service;
class BattleManager
{
    /**
     * Our complex fighting algorithm!
     *
     * @return BattleResult
     */
    const TYPE_NORMAL ="type_normal";
    const TYPE_NO_JEDI = "type_no_jedi";
    const TYPE_ONLY_JEDI = "only_jedi";

    public function battle(AbstractShip $ship1, $ship1Quantity, AbstractShip $ship2, $ship2Quantity,$battleType)
    {
        $ship1Health = $ship1->getStrength() * $ship1Quantity;
        $ship2Health = $ship2->getStrength() * $ship2Quantity;

        $ship1UsedJediPowers = false;
        $ship2UsedJediPowers = false;
        $i=0;
        while ($ship1Health > 0 && $ship2Health > 0) {
            // first, see if we have a rare Jedi hero event!
            if ($battleType != self::TYPE_NO_JEDI && $this->didJediDestroyShipUsingTheForce($ship1)) {
                $ship2Health = 0;
                $ship1UsedJediPowers = true;

                break;
            }
            if ($battleType != self::TYPE_NO_JEDI && $this->didJediDestroyShipUsingTheForce($ship2)) {
                $ship1Health = 0;
                $ship2UsedJediPowers = true;

                break;
            }
            if($battleType != self::TYPE_ONLY_JEDI){
                // now battle them normally
                $ship1Health = $ship1Health - ($ship2->getWeaponPower() * $ship2Quantity);
                $ship2Health = $ship2Health - ($ship1->getWeaponPower() * $ship1Quantity);
            }
           if($i == 100){
               $ship1Health=0;
               $ship2Health=0;
           }
           $i++;
        }
        // update the strengths on the ships, so we can show this
        $ship1->setStrength($ship1Health);
        $ship2->setStrength($ship2Health);

        if ($ship1Health <= 0 && $ship2Health <= 0) {
            // they destroyed each other
            $winningShip = null;
            $losingShip = null;
            $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
        } elseif ($ship1Health <= 0) {
            $winningShip = $ship2;
            $losingShip = $ship1;
            $usedJediPowers = $ship2UsedJediPowers;
        } else {
            $winningShip = $ship1;
            $losingShip = $ship2;
            $usedJediPowers = $ship1UsedJediPowers;
        }

        return new BattleResult($usedJediPowers, $winningShip, $losingShip);
    }

    private function didJediDestroyShipUsingTheForce(AbstractShip $ship): bool
    {
        $jediHeroProbability = $ship->getJediFactor() / 100;

        return mt_rand(1, 100) <= ($jediHeroProbability*100);
    }
    public static function getAllBattleTypesWithDescription(): array
    {
        return  Array(
            self::TYPE_NORMAL => "normal",
            self::TYPE_ONLY_JEDI => "No Jedi Powers",
            self::TYPE_NO_JEDI => "Only Jedi Powers"
        );
    }
}
