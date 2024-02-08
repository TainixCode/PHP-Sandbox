<?php

namespace Challenges\MONSTERS_3;

class Monster
{
    public function __construct(
        public readonly string $name,
        public readonly FoodType $foodType,
        public readonly int $weight,
    ) {}

    public static function createFromText(string $informations): Monster
    {
        $data = explode(':', $informations);

        return new self(
            name: $data[0], 
            foodType: FoodType::from($data[1]),
            weight: (int) $data[2]
        );
    }
}