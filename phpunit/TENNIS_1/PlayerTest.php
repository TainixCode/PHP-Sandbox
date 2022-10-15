<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\TENNIS_1\Player;

final class PlayerTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_win_1_point(): void
    {
        $player = new Player('P');

        $result = $player->play('P');

        $this->assertEquals(
            Player::WIN_POINT,
            $result
        );

        $this->assertEquals(
            15,
            $player->getScore()
        );
    }

    public function test_lose_1_point(): void
    {
        $player = new Player('P');

        $result = $player->play('X');

        $this->assertEquals(
            Player::LOSE_POINT,
            $result
        );

        $this->assertEquals(
            0,
            $player->getScore()
        );
    }

    public function test_win_2_points(): void
    {
        $player = new Player('P');

        $result = $player->play('P');
        $result = $player->play('P');

        $this->assertEquals(
            Player::WIN_POINT,
            $result
        );

        $this->assertEquals(
            30,
            $player->getScore()
        );
    }
    
    public function test_win_3_points(): void
    {
        $player = new Player('P');

        $result = $player->play('P');
        $result = $player->play('P');
        $result = $player->play('P');

        $this->assertEquals(
            Player::WIN_POINT,
            $result
        );

        $this->assertEquals(
            40,
            $player->getScore()
        );
    }

    public function test_win_4_points_so_1_game(): void
    {
        $player = new Player('P');

        $result = $player->play('P');
        $result = $player->play('P');
        $result = $player->play('P');
        $result = $player->play('P');

        $this->assertEquals(
            Player::WIN_GAME,
            $result
        );

        $this->assertEquals(
            1,
            $player->getGame()
        );

        $this->assertEquals(
            0,
            $player->getScore()
        );
    }

    public function test_win_24_points_so_6_games_so_1_set(): void
    {
        $player = new Player('P');

        for ($i = 1; $i <= 24; $i++) {
            $result = $player->play('P');
        }

        $this->assertEquals(
            Player::WIN_SET,
            $result
        );

        $this->assertEquals(
            1,
            $player->getSet()
        );

        $this->assertEquals(
            0,
            $player->getGame()
        );

        $this->assertEquals(
            0,
            $player->getScore()
        );
    }
}