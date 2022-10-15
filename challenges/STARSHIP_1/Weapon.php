<?php
declare(strict_types=1);

namespace Challenges\STARSHIP_1;

class Weapon
{
    public function getPowerToDestroyShip(int $shield): int
    {
        if ($shield < 100) {
            return (int) ceil($shield / 10);
        }

        if ($shield < 1000) {
            return 3 * (int) ceil($shield / 100) + 25;
        }

        return 5 * (int) ceil($shield / 1000) + 80;
    }
}