<?php
declare(strict_types=1);

namespace Challenges\GOT_1\Troops;

use Challenges\GOT_1\Troops;

class Dothrakis extends Troops
{
    public function calculNumberOfTroops(): void
    {
        $this->nbTroops = (int) min([$this->army, 5000]);
    }

    public function getRealNumberOfTroops(): int
    {
        return $this->nbTroops;
    }
}