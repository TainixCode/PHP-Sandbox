<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\PIERRE_FEUILLE_CISEAUX\PFCGame;

final class Pierre_feuille_ciseauxTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
		$this->PFCGame = new PFCGame;
	}

	public function test_Feuille_donne_Ciseaux(): void
	{
		$this->assertEquals(
			$this->PFCGame->play('F'),
			'C'
		);
	}

	public function test_Ciseaux_donne_Pierre(): void
	{
		$this->assertEquals(
			$this->PFCGame->play('C'),
			'P'
		);
	}

	public function test_Pierre_donne_Feuille(): void
	{
		$this->assertEquals(
			$this->PFCGame->play('P'),
			'F'
		);
	}

	public function test_partie_3_coups(): void
	{
		$this->assertEquals(
			$this->PFCGame->party('PFC'),
			'FCP'
		);
	}
}