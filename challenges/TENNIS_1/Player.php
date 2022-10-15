<?php
namespace Challenges\TENNIS_1;

class Player
{
    public const LOSE_POINT = 'lose_point';

    public const WIN_POINT = 'win_point';
    public const WIN_GAME = 'win_game';
    public const WIN_SET = 'win_set';

    private const NB_POINTS_TO_WIN_A_GAME = 4;
    private const NB_GAMES_TO_WIN_A_SET = 6;

    private int $set;
    private int $game;
    private int $score;

    private string $name;

    public function __construct(string $name)
    {
        $this->set = $this->game = $this->score = 0;
        $this->name = $name;
    }

    public function play(string $name): string
    {
        if ($name != $this->name) {
            return self::LOSE_POINT;
        }

        $this->score++;

        if ($this->score === self::NB_POINTS_TO_WIN_A_GAME) {

            $this->game++;

            if ($this->game === self::NB_GAMES_TO_WIN_A_SET) {

                $this->set++;
                $this->initGame();
                return self::WIN_SET;
            }

            $this->initScore();
            return self::WIN_GAME;
        }

        return self::WIN_POINT;
    }

    public function initScore(): void
    {
        $this->score = 0;
    }

    public function initGame(): void
    {
        $this->game = 0;
        $this->initScore();
    }

    public function getSet(): int
    {
        return $this->set;
    }

    public function getGame(): int 
    {
        return $this->game;
    }

    public function getScore(): int
    {
        $scores = [0, 15, 30, 40];
        return $scores[$this->score];
    }
}