<?php
declare(strict_types=1);

namespace Challenges\TRAIN_1_enums;

enum Events: string
{
    case TRAIN_STATION = 'T';
    case POWER_BREAK = 'P';
    case NATURAL_INCIDENT = 'N';

    public function distance(): int
    {
        return match($this) {
            self::TRAIN_STATION => 10,
            self::POWER_BREAK => 10,
            self::NATURAL_INCIDENT => 5,
            default => 0
        };
    }
    
    public function speed(): int
    {
        return match($this) {
            self::TRAIN_STATION => 50,
            self::POWER_BREAK => 5,
            self::NATURAL_INCIDENT => 10,
            default => 1
        };
    }

    public function timeInSeconds(): float
    {
        return $this->distance() / $this->speed() * 3600;
    }

    public function name(): string
    {
        return match($this) {
            self::TRAIN_STATION => 'TrainStation',
            self::POWER_BREAK => 'PowerBreak',
            self::NATURAL_INCIDENT => 'NaturalIncident',
            default => ''
        };
    }
}