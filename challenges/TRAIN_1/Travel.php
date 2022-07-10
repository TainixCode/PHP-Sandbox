<?php
declare(strict_types=1);

namespace Challenges\TRAIN_1;

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

        $this->nbTrainStations = substr_count($events, Events::TRAIN_STATION);
        $this->nbTrainStations--; // Pour gérer la gare de début et la gare de fin
        
        $this->nbPowerBreaks = substr_count($events, Events::POWER_BREAK);
        $this->nbNaturalIncidents = substr_count($events, Events::NATURAL_INCIDENT);
    }

    public function calculate(): float
    {
        $totalDistanceWithoutEvents = $this->totalDistance;
        $totalTime = 0;

        // TRAIN STATION
        $totalDistanceWithoutEvents -= $this->nbTrainStations * Events::distance(Events::TRAIN_STATION);
        $totalTime += $this->nbTrainStations * Events::timeInSeconds(Events::TRAIN_STATION);

        // POWER BREAKS
        $totalDistanceWithoutEvents -= $this->nbPowerBreaks * Events::distance(Events::POWER_BREAK);
        $totalTime += $this->nbPowerBreaks * Events::timeInSeconds(Events::POWER_BREAK);

        // NATURAL INCIDENT
        $totalDistanceWithoutEvents -= $this->nbNaturalIncidents * Events::distance(Events::NATURAL_INCIDENT);
        $totalTime += $this->nbNaturalIncidents * Events::timeInSeconds(Events::NATURAL_INCIDENT);

        // LE RESTE
        $totalTime += $totalDistanceWithoutEvents / self::SPEED_TRAIN_REGULAR * 3600;

        return $totalTime;
    }

    public function calculate2(): float
    {
        $totalDistanceWithoutEvents = $this->totalDistance;
        $totalTime = 0;

        foreach (Events::names() as $event => $eventName) {
            $name = 'nb' . $eventName . 's';

            $totalDistanceWithoutEvents -= $this->$name * Events::distance($event);
            $totalTime += $this->$name * Events::timeInSeconds($event);
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

            $totalDistanceWithoutEvents -= Events::distance($event);
            $totalTime += Events::timeInSeconds($event);
        }

        // LE RESTE
        $totalTime += $totalDistanceWithoutEvents / self::SPEED_TRAIN_REGULAR * 3600;

        return $totalTime;
    }
}