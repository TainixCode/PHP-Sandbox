<?php
declare(strict_types=1);

namespace Challenges\NOEL_2023_1;

enum Event: string implements TemperatureModifier
{
    case CHOCOLAT_BRULE = 'chocolat_brule';
    case EPICE_SURPRISE = 'epice_surprise';
    case TASSE_FROIDE = 'tasse_froide';

    public function modifyTemperature(int $temperature): int
    {
        return match($this) {
            self::CHOCOLAT_BRULE => $temperature - 10,
            self::EPICE_SURPRISE => $temperature + 10,
            self::TASSE_FROIDE => $temperature * 2,
        };
    }
}