<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_heritage;

class Mario extends Jumper
{
    public function __construct()
    {
        parent::__construct('M');
    }

    public function canJump(int $gapLength): bool
    {
        return $gapLength <= 3;
    }
}