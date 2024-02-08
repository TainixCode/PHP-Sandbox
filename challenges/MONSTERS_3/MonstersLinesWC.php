<?php
declare(strict_types=1);

namespace Challenges\MONSTERS_3;

class MonstersLinesWC
{
    /**
     * @var Monster[]
     */
    private array $monsters = [];

    public function addMonsterFromText(string $informations): void
    {
        $this->monsters[] = Monster::createFromText($informations);
    }

    public function getMonstersFromFoodType(FoodType $foodType, int $nbMonsters = 3): string
    {
        // 1. Initialisation d'un tableau vide
        $monsters = [];

        // 2. Je filtre en selon le type de nourriture
        foreach ($this->monsters as $monster) {
            if ($monster->foodType === $foodType) {
                $monsters[] = $monster;
            }
        }

        // 3. Je trie dans un sens ou dans l'autre, selon le type de nourriture
        // grâce à la fonction usort, en comparant les poids
        if ($foodType === FoodType::FRUITS || $foodType === FoodType::GRASS) {
            usort($monsters, function (Monster $m1, Monster $m2) {
                return $m1->weight <=> $m2->weight;
            });
        } else {
            // Sens inverse
            usort($monsters, function (Monster $m1, Monster $m2) {
                return $m2->weight <=> $m1->weight;
            });
        }

        // 4. Je garde les N premiers monstres
        $monsters = array_slice($monsters, 0, $nbMonsters);

        // 5. J'extraie les noms des monstres
        $names = array_column($monsters, 'name');

        // 6. Je lie les noms avec un "-"
        return implode('-', $names);
    }

    public function getAllFirstThree(): string
    {
        // 0. Je précise l'ordre attendu 
        $foodTypes = [
            FoodType::FRUITS,
            FoodType::GRASS,
            FoodType::ROCK,
            FoodType::WOOD
        ];

        // 0. J'initialise un tableau vide en vue de mon implode final
        $result = [];

        // 1. Je parcours chaque type pour récupérer les 3 premiers monstres
        foreach ($foodTypes as $foodType) {
            $result[] = $this->getMonstersFromFoodType($foodType, 3);
        }

        // 2. Je lie les éléments avec un "-"
        return implode('-', $result);
    }
}