<?php
declare(strict_types=1);

namespace Challenges\GOT_1\Troops;

use Challenges\GOT_1\Troops;

class Dragons extends Troops
{
    public function calculNumberOfTroops(): void
    {
        $troops = floor($this->army / 3);

        $troops = floor($troops / 1000);

        $this->nbTroops = (int) min([$troops, 3]);
    }

    public function getRealNumberOfTroops(): int
    {
        return $this->nbTroops * 1000;
    }
}