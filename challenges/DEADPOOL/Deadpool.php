<?php
declare(strict_types=1);

namespace Challenges\DEADPOOL;

class Deadpool
{
    public const STEP_NOTHING = '_';
    public const STEP_SOLDIERS = 'S';
    public const STEP_HEAVY_WEAPONS = 'H';
    public const STEP_TANK = 'T';
    public const STEP_EXPLOSION = 'E';

    public const HEALTH_MAX = 100;
    public const HEALTH_MIN = 0;

    public int $hp = self::HEALTH_MAX;
    public int $time = 0;

    public function steps(string $steps): void
    {
        foreach (str_split($steps) as $step) {
            $this->step($step);
        }
    }

    public function step(string $step): void
    {
        $this->hp += $this->getEffectOnHpForAStep($step);
        $this->time += $this->getTimeForAStep($step);

        if ($this->hp > self::HEALTH_MAX) {
            $this->hp = self::HEALTH_MAX;
        }

        if ($this->hp <= self::HEALTH_MIN) {
            $this->regenerate();
        }
    }

    private function getEffectOnHpForAStep(string $step): int
    {
        $hpEffects = [
            self::STEP_NOTHING => 5,
            self::STEP_SOLDIERS => -10,
            self::STEP_HEAVY_WEAPONS => -25,
            self::STEP_TANK => -50,
            self::STEP_EXPLOSION => -100
        ];

        return $hpEffects[$step] ?? 0;
    }

    private function getTimeForAStep(string $step): int
    {
        $times = [
            self::STEP_NOTHING => 10,
            self::STEP_SOLDIERS => 10,
            self::STEP_HEAVY_WEAPONS => 30,
            self::STEP_TANK => 120,
            self::STEP_EXPLOSION => 0
        ];

        return $times[$step] ?? 0;
    }

    private function regenerate(): void
    {
        $this->time += 5 * 60;
        $this->hp = self::HEALTH_MAX;
    }

    public function getResult(): string
    {
        return Clock::minutesAndSeconds($this->time) . '_' . $this->hp . 'hp';
    }
}

