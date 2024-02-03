<?php
declare(strict_types=1);

namespace Challenges\NOEL_2023_1;

interface TemperatureModifier
{
    public function modifyTemperature(int $temperature): int;
}