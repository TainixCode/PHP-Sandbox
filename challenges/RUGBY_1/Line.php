<?php
declare(strict_types=1);

namespace Challenges\RUGBY_1;

class Line
{
    /**
     * @var Player[] $players
     */
    private array $players = [];
    private ImpactStrategy $strategy;

    /**
     * @param string[] $playersInformations
     */
    public function __construct(array $playersInformations, ImpactStrategy $strategy)
    {
        foreach ($playersInformations as $playerInformations) {
            $this->players[] = Player::createFromText($playerInformations);
        }

        $this->strategy = $strategy;
    }

    public function impact(): int
    {
        $impact = 0;

        foreach ($this->players as $player) {
            $impact += $this->strategy->calculateImpact($player);
        }

        return $impact;
    }
}