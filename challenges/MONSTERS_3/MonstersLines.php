<?php
declare(strict_types=1);

namespace Challenges\MONSTERS_3;

class MonstersLines
{
    /**
     * @var Monster[]
     */
    private array $monsters = [];

    public function addMonsterFromText(string $informations): void
    {
        $this->monsters[] = Monster::createFromText($informations);
    }

    public function getMonstersFromFoodType(FoodType $foodType, int $number = 3): string
    {
        // Gestion du tri, par défaut, dans l'ordre croissant, décroissant pour ROCK et WOOD
        $sort = 'sortBy';
        if ($foodType === FoodType::ROCK || $foodType === FoodType::WOOD) {
            $sort = 'sortByDesc';
        }

        return collect($this->monsters)
            ->filter(function(Monster $item) use ($foodType) {
                return $item->foodType === $foodType;
            })
            ->$sort('weight')
            ->slice(0, $number)
            ->implode('name', '-');
    }

    public function getAllFirstThree(): string
    {
        return collect(FoodType::cases())
            ->map( fn(FoodType $foodType) => $this->getMonstersFromFoodType($foodType, 3) )
            ->implode('-');
    }
}