<?php
namespace Challenges\TENNIS_1;

class Game
{
    private const NEXT_POINT = 'next_point';

    private Player $player1;
    private Player $player2;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1 = new Player($player1Name);
        $this->player2 = new Player($player2Name);
    }

    public function points(string $points): void
    {
        foreach (str_split($points) as $playerWinPoint) {
            $this->point($playerWinPoint);
        }
    }

    private function point(string $playerName): void
    {
        match ($this->player1->play($playerName)) {
            Player::WIN_GAME => $this->player2->initScore(),
            Player::WIN_SET => $this->player2->initGame(),
            default => self::NEXT_POINT
        };

        match ($this->player2->play($playerName)) {
            Player::WIN_GAME => $this->player1->initScore(),
            Player::WIN_SET => $this->player1->initGame(),
            default => self::NEXT_POINT
        };
    }

    public function getCurrentScore(): string
    {
        return implode(':', [
            $this->player1->getGame(),
            $this->player2->getGame(),
            $this->player1->getScore(),
            $this->player2->getScore(),
        ]);
    }
}