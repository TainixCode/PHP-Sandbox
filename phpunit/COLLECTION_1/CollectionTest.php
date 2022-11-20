<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\COLLECTION_1\Collection;
use Challenges\COLLECTION_1\Figurine;

final class CollectionTest extends TestCase
{
	private Collection $collection;

	public function setUp(): void
	{
		parent::setUp();

		$exemplaires = [50, 5000];
		$cotes = [1.5, 2.5];
		$this->collection = new Collection($exemplaires, $cotes);
	}

	public function test_instanciation_figurine(): void
	{
		$this->assertInstanceOf(
			Figurine::class,
			$this->collection->getFigurines()[0]
		);
	}

	public function test_total_achat(): void
	{
		$this->assertEquals(
			30 + 15,
			$this->collection->getTotalPriceBuy()
		);
	}

	public function test_total_vente(): void
	{
		$this->assertEquals(
			30 * 1.5 + 15 * 2.5,
			$this->collection->getTotalPriceSell()
		);
	}

	public function test_jeu_donnees_complet(): void
	{
		$exemplaires = [50, 50, 50000, 2000, 50000, 2000, 2000, 2000, 50000, 2000, 2000, 50000, 50000, 2000, 2000, 2000, 50000];
		$cotes = [2, 8, 1, 0.6, 1, 1.2, 1, 0.6, 0.6, 1, 1, 1, 0.8, 1.2, 1, 1, 0.6];

		$collection = new Collection($exemplaires, $cotes);

		$this->assertEquals(
			219, // Réponse fournie par Tainix
			$collection->getTotalDifference()
		);
	}
}