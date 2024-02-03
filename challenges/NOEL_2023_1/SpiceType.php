<?php
declare(strict_types=1);

namespace Challenges\NOEL_2023_1;

enum SpiceType: string implements TemperatureModifier
{
    case CANNELLE = 'cannelle';
    case MUSCADE = 'muscade';
    case PIMENT = 'piment';
    case VANILLE = 'vanille';

    public function modifyTemperature(int $temperature): int
    {
        return match($this) {
            self::CANNELLE => $temperature + 4,
            self::MUSCADE => $temperature + 7,
            self::PIMENT => $temperature + 9,
            self::VANILLE => $temperature + 1,
        };
    }
}