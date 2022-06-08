<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\WALL_E_solid\Lifter;

final class LifterTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    /**
     * @return array<int, array<int, int>>
     */
    public function providerGetConsumedBattery(): array
    {
        // batterie de départ, poids, batterie dépensée
        return [
            // Si la force de Wall-E est supérieure ou égale au poids du déchet, cela ne lui coute que 1% de batterie.
            [100, 18, 1],
            [100, 20, 1],

            // Si Wall-E n’a pas assez de force, il peut puiser dans sa batterie pour augmenter sa force initiale

            // 1 pt de force supplémentaire coute 2% de batterie.
            [100, 21, 2],
            [100, 22, 4],
            [100, 23, 6],
            [100, 30, 20],

            // Batterie différente
            [40, 21, 2],
            [40, 25, 10],
            [40, 30, 20], // Pile la moitié

            // Wall-E ne peut pas dépenser + de la moitié de sa batterie courante pour augmenter sa force.
            // Si malgré la batterie, il n’a pas assez de force pour traiter le déchet, Wall-E perd 2% de batterie
            [40, 35, 2]
        ];
    }

    /**
     * @dataProvider providerGetConsumedBattery
     */
    public function test_getConsumedBattery(int $batteryCurrentLevel, int $weight, int $batteryToUse): void
    {
        $lifter = new Lifter(20);

        $this->assertEquals(
            $batteryToUse,
            $lifter->getConsumedBattery($weight, $batteryCurrentLevel)
        );
    }
}