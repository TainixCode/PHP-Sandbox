<?php

declare(strict_types=1);

namespace Challenges\RUGBY_1;

class Scrum
{
    public function __construct(
        private Line $firstLine,
        private Line $secondLine,
        private Line $thirdLine,
    ) {}

    public function impact(): int
    {
        return $this->firstLine->impact() + $this->secondLine->impact() + $this->thirdLine->impact();
    }
}