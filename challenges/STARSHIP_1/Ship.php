<?php
declare(strict_types=1);

namespace Challenges\STARSHIP_1;

class Ship
{
    private int $shield;

    public function __construct(int $shield)
    {
        $this->shield = $shield;
    }

    public function getShield(): int
    {
        return $this->shield;
    }
}