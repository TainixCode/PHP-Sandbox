<?php
declare(strict_types=1);

namespace Challenges\CODE_LANTA;

class Plane
{
    public function __construct(
        private int $x,
        private int $y
    ) {}

    public function moves(array $movesInformations): void
    {
        foreach ($movesInformations as $move) {
            [$axe, $value] = explode(':', $move);
            
            if ($axe == 'x') {
                $this->x += $value;
            } else {
                $this->y += $value;
            }

            // Possible en 1 ligne avec la notion de "variable variable" :
            // $this->$axe += $value;
        }
    }

    public function getPosition(): string
    {
        return $this->x . ';' . $this->y;
    }
}