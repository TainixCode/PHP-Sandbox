<?php
declare(strict_types=1);

namespace Challenges\ELECTION;

class Candidate
{
    private string $name;
    private int $votes;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->votes = 0;
    }

    public function addVote(int $nbVotes = 1): void
    {
        $this->votes += $nbVotes;
    }

    public function getPourcentage(int $nbVotesTotal): float
    {
        if ($nbVotesTotal === 0) {
            throw new \Exception('Pas de division par zéro.');
        }

        return round($this->votes / $nbVotesTotal * 100, 1);
    }

    /**
     * GETTERS -------------------------------------------
     */

    public function getName(): string
    {
        return $this->name;
    }

    public function getVotes(): int
    {
        return $this->votes;
    }
}
