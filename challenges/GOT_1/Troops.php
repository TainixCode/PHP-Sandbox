<?php
declare(strict_types=1);

namespace Challenges\GOT_1;

abstract class Troops
{
    protected int $nbTroops;

    public function __construct(
        protected int $army
    ) {}

    abstract public function calculNumberOfTroops(): void;
    abstract public function getRealNumberOfTroops(): int;

    public function getNbTroops(): int
    {
        return $this->nbTroops;
    }
}