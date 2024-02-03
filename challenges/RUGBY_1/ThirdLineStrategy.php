<?php
declare(strict_types=1);

namespace Challenges\RUGBY_1;

class ThirdLineStrategy implements ImpactStrategy
{
    public function calculateImpact(Player $player): int
    {
        return (int) floor($player->impact() * 0.75);
    }
}