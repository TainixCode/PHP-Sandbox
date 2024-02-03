<?php
declare(strict_types=1);

namespace Challenges\RUGBY_1;

interface ImpactStrategy
{
    public function calculateImpact(Player $player): int;
}