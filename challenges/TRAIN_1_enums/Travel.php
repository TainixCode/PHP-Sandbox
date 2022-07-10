<?php
declare(strict_types=1);

namespace Challenges\TRAIN_1_enums;

class Travel
{
    private const SPEED_TRAIN_REGULAR = 200;
    private const LINE_REGULAR = '_';

    private int $nbTrainStations;
    private int $nbPowerBreaks;
    private int $nbNaturalIncidents;

    private string $events;
    private int $totalDistance;

    public function __construct(int $totalDistance, string $events)
    {
        $this->events = $events;
        $this->totalDistance = $totalDistance;

        $this->nbTrainStations = substr_count($events, Events::TRAIN_STATION->value);
        $this->nbTrainStations--; // Pour gérer la gare de début et la gare de fin

        $this->nbPowerBreaks = substr_count($events, Events::POWER_BREAK->value);
        $this->nbNaturalIncidents = substr_count($events, Events::NATURAL_INCIDENT->value);
    }

    public function calculate(): float
    {
        $totalDistanceWithoutEvents = $this->totalDistance;
        $totalTime = 0;

        // TRAIN STATION
        $totalDistanceWithoutEvents -= $this->nbTrainStations * Events::TRAIN_STATION->distance();
        $totalTime += $this->nbTrainStations * Events::TRAIN_STATION->timeInSeconds();

        // POWER BREAKS
        $totalDistanceWithoutEvents -= $this->nbPowerBreaks * Events::POWER_BREAK->distance();
        $totalTime += $this->nbPowerBreaks * Events::POWER_BREAK->timeInSeconds();

        // NATURAL INCIDENT
        $totalDistanceWithoutEvents -= $this->nbNaturalIncidents * Events::NATURAL_INCIDENT->distance();
        $totalTime += $this->nbNaturalIncidents * Events::NATURAL_INCIDENT->timeInSeconds();

        // LE RESTE
        $totalTime += $totalDistanceWithoutEvents / self::SPEED_TRAIN_REGULAR * 3600;

        return $totalTime;
    }

    public function calculate2(): float
    {
        $totalDistanceWithoutEvents = $this->totalDistance;
        $totalTime = 0;

        foreach (Events::cases() as $event) {
            $name = 'nb' . $event->name() . 's';

            $totalDistanceWithoutEvents -= $this->$name * $event->distance();
            $totalTime += $this->$name * $event->timeInSeconds();
        }
        
        // LE RESTE
        $totalTime += $totalDistanceWithoutEvents / self::SPEED_TRAIN_REGULAR * 3600;

        return $totalTime;
    }

    public function calculate3(): float
    {
        $totalDistanceWithoutEvents = $this->totalDistance;
        $totalTime = 0;

        // On retire la première gare
        foreach (str_split(substr($this->events, 1)) as $event) {

            if ($event === self::LINE_REGULAR) {
                continue;
            }

            $totalDistanceWithoutEvents -= Events::from($event)->distance();
            $totalTime += Events::from($event)->timeInSeconds();
        }

        // LE RESTE
        $totalTime += $totalDistanceWithoutEvents / self::SPEED_TRAIN_REGULAR * 3600;

        return $totalTime;
    }
}