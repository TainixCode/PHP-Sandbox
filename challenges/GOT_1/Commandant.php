<?php
declare(strict_types=1);

namespace Challenges\GOT_1;

class Commandant
{
    /**
     * @var int[] $composition
     */
    private array $composition = [];

    public function __construct(
        private int $army
    ) {}

    /**
     * @param string[] $troops
     */
    public function determineTroops(array $troops): void
    {
        foreach ($troops as $troopClass) {
            $troop = TroopsFactory::recruit($troopClass, $this->army);

            $troop->calculNumberOfTroops();

            $this->composition[] = $troop->getNbTroops();
            $this->army -= $troop->getRealNumberOfTroops();
        }
    }

    public function getComposition(): string
    {
        return implode('_', $this->composition);
    }
}