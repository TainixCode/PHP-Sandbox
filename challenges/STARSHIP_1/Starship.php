<?php
declare(strict_types=1);

namespace Challenges\STARSHIP_1;

class Starship
{
    private int $power;
    private Weapon $weapon;

    public function __construct()
    {
        $this->power = 0;
        $this->weapon = new Weapon;
    }

    public function attack(Ship $ship): void
    {
        $this->power += $this->weapon->getPowerToDestroyShip($ship->getShield());
    }

    public function getPower(): int
    {
        return $this->power;
    }
}