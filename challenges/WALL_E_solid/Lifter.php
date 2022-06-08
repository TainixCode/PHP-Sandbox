<?php
declare(strict_types=1);

namespace Challenges\WALL_E_solid;

class Lifter
{
    private const BATTERY_RATIO_TO_LIFT_WEIGHT = 2;
    private const BATTERY_IF_NOT_POSSIBLE_TO_LIFT_WEIGHT = 2;
    private const BATTERY_IF_OK_TO_LIFT_WEIGHT = 1;

    public function __construct(
        private int $force
    )
    {
    }

    public function getConsumedBattery(int $weight, int $batteryCurrentLevel): int
    {
        // Force supérieure ou égale au poids du déchet => 1% de batterie
        if ($this->force >= $weight) {
            return self::BATTERY_IF_OK_TO_LIFT_WEIGHT;
        }
        
        // Sinon, la différence * 2
        $battery = ($weight - $this->force) * self::BATTERY_RATIO_TO_LIFT_WEIGHT;

        // Je ne dois pas dépasser la moitié de la batterie
        if ($battery > ($batteryCurrentLevel / 2)) {
            return self::BATTERY_IF_NOT_POSSIBLE_TO_LIFT_WEIGHT;
        }
        
        return $battery;
    }
}