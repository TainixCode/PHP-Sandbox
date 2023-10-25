<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_interfaces;

class Peach implements Jumper
{
    public function canJump(int $gapLength): bool
    {
        return $gapLength >= 3 && $gapLength <= 5;
    }

    public function getName(): string
    {
        return 'P';
    }
}