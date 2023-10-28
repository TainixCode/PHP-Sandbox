<?php
declare(strict_types=1);

namespace Challenges\GOT_1\Troops;

use Challenges\GOT_1\Troops;

class Immacules extends Troops
{
    public function calculNumberOfTroops(): void
    {
        $troops = floor($this->army / 2);

        $troops = floor($troops / 15);

        $this->nbTroops = (int) min([$troops, 200]);
    }

    public function getRealNumberOfTroops(): int
    {
        return $this->nbTroops * 15;
    }
}