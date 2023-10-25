<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_heritage;

abstract class Jumper
{
    public function __construct(
        public readonly string $name
    ) {}

    abstract public function canJump(int $gapLength): bool; 
}