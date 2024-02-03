<?php
declare(strict_types=1);

namespace Challenges\RUGBY_1;

class SecondLineStrategy implements ImpactStrategy
{
    public function calculateImpact(Player $player): int
    {
        return $player->impact();
    }
}