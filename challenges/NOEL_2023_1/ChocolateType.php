<?php
declare(strict_types=1);

namespace Challenges\NOEL_2023_1;

enum ChocolateType: string implements TemperatureModifier
{
    case NOIR = 'noir';
    case AU_LAIT = 'au_lait';
    case BLANC = 'blanc';
    case MELANGE = 'melange';

    public function modifyTemperature(int $temperature): int
    {
        return match($this) {
            self::NOIR => $temperature + 5,
            self::AU_LAIT => $temperature + 10,
            self::BLANC => $temperature + 15,
            self::MELANGE => $temperature + 12,
        };
    }
}