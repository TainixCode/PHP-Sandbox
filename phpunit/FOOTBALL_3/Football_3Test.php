<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\FOOTBALL_3\Board;

final class Football_3Test extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();

		$group = ['FRA', 'BEL', 'ANG'];
		$this->Board = new Board($group);
	}

	// TES METHODES DE TEST ---------------------
	public function test_constructeur(): void
	{
		$this->assertEquals(
			$this->Board->scores,
			['FRA' => 0, 'BEL' => 0, 'ANG' => 0]
		);
	}

	public function test_match_domicile_gagne(): void
	{
		$score = 'FRA_BEL_1_0';
		$this->Board->match($score);

		$this->assertEquals(
			$this->Board->scores,
			['FRA' => 3, 'BEL' => 0, 'ANG' => 0]
		);
	}

	public function test_match_exterieur_gagne(): void
	{
		$score = 'FRA_BEL_0_4'; // Dans un univers parallèle
		$this->Board->match($score);

		$this->assertEquals(
			$this->Board->scores,
			['FRA' => 0, 'BEL' => 3, 'ANG' => 0]
		);
	}

	public function test_match_egalite(): void
	{
		$score = 'FRA_ANG_2_2';
		$this->Board->match($score);

		$this->assertEquals(
			$this->Board->scores,
			['FRA' => 1, 'BEL' => 0, 'ANG' => 1]
		);
	}

	public function test_matchs(): void
	{
		$scores = ['FRA_BEL_1_0', 'ANG_FRA_2_2'];
		$this->Board->matchs($scores);

		$this->assertEquals(
			$this->Board->scores,
			['FRA' => 4, 'BEL' => 0, 'ANG' => 1]
		);
	}

	public function test_classement(): void
	{
		$scores = ['FRA_BEL_1_0', 'ANG_FRA_2_2'];
		$this->Board->matchs($scores);

		$this->assertEquals(
			$this->Board->getOrder(),
			'FRAANGBEL'
		);
	}
}