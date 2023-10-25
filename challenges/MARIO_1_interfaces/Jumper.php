<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_interfaces;

interface Jumper
{
    public function canJump(int $gapLength): bool;
    public function getName(): string;
}