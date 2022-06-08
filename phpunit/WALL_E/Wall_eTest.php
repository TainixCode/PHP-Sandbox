<?php
declare(strict_types=1);

use Challenges\WALL_E\Robot;
use PHPUnit\Framework\TestCase;

final class Wall_eTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function providerBatterieDepenseeSelonPoidsDechets(): array
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
	 * @dataProvider providerBatterieDepenseeSelonPoidsDechets
	 */
    public function test_batterie_pour_soulever_dechet(int $batterieDepart, int $poidsDechet, int $batterieDepensee): void
    {
        $walle = new Robot(
            force: 20,
            vitesse: 10,
            batterie: $batterieDepart
        );

        $this->assertEquals(
            $walle->batteriePourDechet($poidsDechet),
            $batterieDepensee
        );
    }

    /**
     * @dataProvider providerNiveauDeBatterieApresRecharge
     */
    public function test_recharge_batterie(
        int $vitesse,
        int $batterieInitiale,
        int $batterieFinale): void
    {
        $walle = new Robot(
            force: 20,
            vitesse: $vitesse,
            batterie: $batterieInitiale
        );

        $walle->rechargeLaBatterie();

        $this->assertEquals(
            $walle->getBatterie(),
            $batterieFinale
        );
    }

    public function providerNiveauDeBatterieApresRecharge(): array
    {
        // Vitesse - batterie initiale - batterie après recharge
        return [
            [10, 50, 50], // Pas de recharge
            [10, 20, 20], // Pas de recharge
            [10, 18, 90], // Recharge OK
            [10, 11, 90], // Recharge OK tout juste
            [10, 10, 0] // Recharge KO, batterie tombe à 0
        ];
    }

    public function test_dechets_wall_e_pas_ko(): void
    {
        $force = 20;
        $vitesse = 5;
        $batterie = 98;
        $dechets = [8, 13, 12, 22, 32, 15, 7, 17, 5, 5, 7, 12, 12, 32, 10, 15, 13, 15, 19, 17];

        $resultat = 29;

        $walle = new Robot(
            force: $force,
            vitesse: $vitesse,
            batterie: $batterie
        );

        $walle->traiteDechets($dechets);

        $this->assertEquals(
            $walle->reponse(),
            $resultat
        );
    }

    public function test_dechets_wall_e_ko(): void
    {
        $force = 13;
        $vitesse = 15;
        $batterie = 82;
        $dechets = [15, 21, 20, 19, 14, 6, 9, 22, 14, 9, 10, 17, 33, 9, 8, 5, 22, 19, 23, 18];

        $resultat = 'KO';

        $walle = new Robot(
            force: $force,
            vitesse: $vitesse,
            batterie: $batterie
        );

        $walle->traiteDechets($dechets);

        $this->assertEquals(
            $walle->reponse(),
            $resultat
        );
    }
}