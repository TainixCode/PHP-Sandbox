<?php
declare(strict_types=1);

namespace Challenges\TRAIN_1;

class Events
{
    public const TRAIN_STATION = 'T';
    public const POWER_BREAK = 'P';
    public const NATURAL_INCIDENT = 'N';

    public static function distance(string $event): int
    {
        $distances = [
            self::TRAIN_STATION => 10,
            self::POWER_BREAK => 10,
            self::NATURAL_INCIDENT => 5
        ];

        return $distances[$event] ?? 0;
    }

    public static function speed(string $event): int
    {
        $speeds = [
            self::TRAIN_STATION => 50,
            self::POWER_BREAK => 5,
            self::NATURAL_INCIDENT => 10
        ];

        return $speeds[$event] ?? 1;
    }

    public static function timeInSeconds(string $event): float
    {
        return self::distance($event) / self::speed($event) * 3600;
    }

    /**
     * @return array<string, string>
     */
    public static function names(): array
    {
        return [
            self::TRAIN_STATION => 'TrainStation',
            self::POWER_BREAK => 'PowerBreak',
            self::NATURAL_INCIDENT => 'NaturalIncident'
        ];
    }
}