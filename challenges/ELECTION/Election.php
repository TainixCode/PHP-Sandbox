<?php
declare(strict_types=1);

namespace Challenges\ELECTION;

class Election
{
    /** 
     * @var array<string, Candidate> $candidates
     */
    private array $candidates = [];

    /** 
     * @var array<int, string> $votes
     */
    private array $votes = [];

    public function parseCandidates(string $candidates): void
    {
        foreach (str_split($candidates) as $name) {
            $this->candidates[$name] = new Candidate($name);
        }
    }

    public function parseVotes(string $votes): void
    {
        $this->votes = str_split($votes);
    }

    public function filterBlankVotes(): void
    {
        $this->votes = array_filter($this->votes, function($vote) {
            return in_array($vote, array_keys($this->candidates));
        });

        // Ré-index
        $this->votes = array_values($this->votes);
    }

    public function countVotes(): void
    {
        foreach ($this->votes as $vote) {
            $this->candidates[$vote]->addVote();
        }
    }

    public function findTopTwo(): string
    {
        uasort($this->candidates, function ($candidate1, $candidate2) {
            return $candidate2->getVotes() <=> $candidate1->getVotes();
        });

        [$first, $second] = array_slice(array_keys($this->candidates), 0, 2);

        $nbVotes = count($this->votes);

        $result = '';

        $result .= $first;
        $result .= $this->candidates[$first]->getPourcentage($nbVotes);

        $result .= '-';

        $result .= $second;
        $result .= $this->candidates[$second]->getPourcentage($nbVotes);

        return $result;
    }

    /**
     * GETTERS -------------------------------------------
     */

    /** 
     * @return array<string, Candidate> 
     */
    public function getCandidates(): array
    {
        return $this->candidates;
    }

    /** 
     * @return array<int, string> 
     */
    public function getVotes(): array
    {
        return $this->votes;
    }
}