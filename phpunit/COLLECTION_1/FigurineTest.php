<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\COLLECTION_1\Figurine;

final class FigurineTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_prix_achat_15(): void
    {
        $figurine = new Figurine(exemplaires: 5000, cote: 1);

        $this->assertEquals(
            15,
            $figurine->getPriceBuy()
        );
    }

    public function test_prix_achat_30(): void
    {
        $figurine = new Figurine(exemplaires: 500, cote: 1);

        $this->assertEquals(
            30,
            $figurine->getPriceBuy()
        );
    }

    /**
     * @return array<int, array<int, int>>
     */
    public function providerExemplairesPour15(): array
    {
        return [[2000], [2001], [2500], [5000], [10000], [50000]];
    }

    /**
     * @dataProvider providerExemplairesPour15
     */
    public function test_prix_achat_15_avec_plein_de_nombre_d_exemplaires(int $exemplaires): void
    {
        $figurine = new Figurine(exemplaires: $exemplaires, cote: 1);

        $this->assertEquals(
            15,
            $figurine->getPriceBuy()
        );
    }

    /**
     * @return array<int, array<int, int>>
     */
    public function providerExemplairesPour30(): array
    {
        return [[1], [20], [50], [500], [1999]];
    }

    /**
     * @dataProvider providerExemplairesPour30
     */
    public function test_prix_achat_30_avec_plein_de_nombre_d_exemplaires(int $exemplaires): void
    {
        $figurine = new Figurine(exemplaires: $exemplaires, cote: 1);

        $this->assertEquals(
            30,
            $figurine->getPriceBuy()
        );
    }

    public function test_prix_vente_figurine_non_rare(): void
    {
        $figurine = new Figurine(exemplaires: 5000, cote: 2.5);

        $this->assertEquals(
            15 * 2.5,
            $figurine->getPriceSell()
        );
    }

    public function test_prix_vente_figurine_rare(): void
    {
        $figurine = new Figurine(exemplaires: 500, cote: 1.5);

        $this->assertEquals(
            30 * 1.5,
            $figurine->getPriceSell()
        );
    }
}