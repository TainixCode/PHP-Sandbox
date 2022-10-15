<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\STARSHIP_1\Weapon;

final class WeaponTest extends TestCase
{
    private Weapon $weapon;

	public function setUp(): void
	{
		parent::setUp();
        $this->weapon = new Weapon;
	}

	// TES METHODES DE TEST ---------------------
	public function test_vaisseau_moins_de_100(): void
	{
		// la résistance divisée par 10, arrondie à l’entier supérieur
		$power = $this->weapon->getPowerToDestroyShip(80);
		$this->assertEquals($power, 8);
		
		$power = $this->weapon->getPowerToDestroyShip(81);
		$this->assertEquals(
			9,
			$power
		);
	}

	public function test_vaisseau_moins_de_1000(): void
	{
		// 3 fois la résistance divisée par 100, arrondie à l’entier supérieur. Une puissance fixe de 25 s’ajoute
		$power = $this->weapon->getPowerToDestroyShip(800);
		$this->assertEquals(
			3 * 8 + 25,
			$power
		);

		$power = $this->weapon->getPowerToDestroyShip(801);
		$this->assertEquals($power, 3 * 9 + 25);
	}
	
	public function test_vaisseau_moins_de_10000(): void
	{
		// 5 fois la résistance divisée par 1.000, arrondie à l’entier supérieur. Une puissance fixe de 80 s’ajoute
		$power = $this->weapon->getPowerToDestroyShip(8000);
		$this->assertEquals(
			5 * 8 + 80,
			$power
		);

		$power = $this->weapon->getPowerToDestroyShip(8001);
		$this->assertEquals(
			5 * 9 + 80,
			$power
		);
	}
}