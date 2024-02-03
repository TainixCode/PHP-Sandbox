<?php
declare(strict_types=1);

namespace Challenges\RUGBY_1;

class Player
{
    public function __construct(
        public readonly int $poids,
        public readonly int $force
    ) {}

    public static function createFromText(string $informations): Player
    {
        $values = explode(':', $informations);
        return new self(
            (int) $values[0],
            (int) $values[1]
        );
    }

    public function impact(): int
    {
        return $this->poids * $this->force;
    }
}