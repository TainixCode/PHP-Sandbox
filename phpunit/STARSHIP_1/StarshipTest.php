<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\STARSHIP_1\Starship;
use Challenges\STARSHIP_1\Ship;

final class StarshipTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	public function test_attaque_1_vaisseau(): void
	{
		$starShip = new Starship;

		$starShip->attack(new Ship(80));

		$this->assertEquals(
			8,
			$starShip->getPower()
		);
	}

	public function test_attaque_2_vaisseaux(): void
	{
		$starShip = new Starship;

		$starShip->attack(new Ship(80));
		$starShip->attack(new Ship(800));

		$this->assertEquals(
			8 + (3 * 8 + 25),
			$starShip->getPower()
		);
	}

	public function test_attaque_3_vaisseaux(): void
	{
		$starShip = new Starship;

		$starShip->attack(new Ship(80));
		$starShip->attack(new Ship(800));
		$starShip->attack(new Ship(8000));

		$this->assertEquals(
			8 + (3 * 8 + 25) + (5 * 8 + 80),
			$starShip->getPower()
		);
	}
}