<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_heritage;

class Peach extends Jumper
{
    public function __construct()
    {
        parent::__construct('P');
    }

    public function canJump(int $gapLength): bool
    {
        return $gapLength >= 3 && $gapLength <= 5;
    }
}