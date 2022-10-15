<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\TENNIS_1\Game;

final class GameTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_2_points(): void
    {
        $game = new Game('D', 'N');
        $game->points('DN');

        $this->assertEquals(
            '0:0:15:15',
            $game->getCurrentScore()
        );
    }

    public function test_1_game(): void
    {
        $game = new Game('D', 'N');
        $game->points('DNDNDND'); // D gagne

        $this->assertEquals(
            '1:0:0:0',
            $game->getCurrentScore()
        );
    }

    public function test_N_never_wins(): void
    {
        $game = new Game('D', 'N');
        $game->points('NNNDDDDNNNDDDDNNNDDDD'); // D gagne

        $this->assertEquals(
            '3:0:0:0',
            $game->getCurrentScore()
        );
    }

    public function test_full_game(): void
    {
        $game = new Game('D', 'N');
        $game->points('NNNDNDNDDNNNDDDDDDDNNDDDNDDNDND');

        $this->assertEquals(
            '3:2:30:30',
            $game->getCurrentScore()
        );
    }

    public function test_full_game_long(): void
    {
        $game = new Game('D', 'N');
        $game->points('NDDDDDNDDDNNNDDDNDDDNDDDNNDDDNDNDNNDNDDDDNDNDDDDDDDNNDDNNDNNDNNNNNDDDDNNDDNNDDNNDNDDDDDDDDDDDDNDDDDNDDNNNDDNNNNNDDNNNNDDDDDDNNNDNNDD');

        $this->assertEquals(
            '2:4:30:15',
            $game->getCurrentScore()
        );
    }
}