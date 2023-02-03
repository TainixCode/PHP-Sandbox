<?php
declare(strict_types=1);

namespace Challenges\SURVIVAL_2;

class Survivor
{
    public const ZONE_WATER = 'W';
    public const ZONE_FOOD = 'F';
    public const ZONE_DIFFICULT_FIELD = '_';

    public function __construct(
        public int $thirst,
        public int $hunger,
        public int $shape
    ) {}
    
/**
 * @param string[] $island
 */
public function adventure(array $island): void
{
    foreach ($island as $region) {

        try {
            $this->region($region);
        } catch (EndOfAdventureException $e) {
            echo $e->message;
            return;
        }

        $this->night();
        if ($this->mustStop()) {
            return;
        }
    }
}

    public function region(string $region): void
    {
        foreach (str_split($region) as $zone) {

            $this->zone($zone);
            if ($this->mustStop()) {
                throw new EndOfAdventureException;
            }
        }
    }

    public function zone(string $zone): void
    {
        switch ($zone) {
            case self::ZONE_WATER:
                $this->zoneWater();
            break;

            case self::ZONE_FOOD:
                $this->zoneFood();
            break;
            
            case self::ZONE_DIFFICULT_FIELD:
                $this->zoneDifficultField();
            break;

            default:
                $this->zoneSimple();
            break;
        }
    }

    public function zoneWater(): void
    {
        $this->thirst++;
        $this->shape--;
    }

    public function zoneFood(): void
    {
        $this->hunger++;
        $this->shape--;
    }

    public function zoneDifficultField(): void
    {
        $this->shape -= 3;
    }

    public function zoneSimple(): void
    {
        $this->shape--;
    }

    public function night(): void
    {
        $this->shape += (int) floor(($this->thirst + $this->hunger) / 2);

        $this->thirst -= 5;
        $this->hunger -= 5;
    }

    public function mustStop(): bool
    {
        return ($this->thirst <= 0 || $this->hunger <= 0 || $this->shape <= 0);
    }

    public function getResult(): int
    {
        $result = 1;

        if ($this->thirst > 0) {
            $result *= $this->thirst;
        }

        if ($this->hunger > 0) {
            $result *= $this->hunger;
        }

        if ($this->shape > 0) {
            $result *= $this->shape;
        }

        return $result;
    }
}