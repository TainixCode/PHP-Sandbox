<?php
declare(strict_types=1);

namespace Challenges\WALL_E;

final class Robot
{
    private const RATIO_BATTERIE_POUR_SOULEVER_DECHET = 2;
    private const BATTERIE_SI_PAS_POSSIBLE_DE_SOULEVER_DECHET = 2;
    private const BATTERIE_SI_POSSIBLE_DE_SOULEVER_DECHET = 1;
    private const BATTERIE_SEUIL_RECHARGE = 20;
    private const BATTERIE_MAX = 100;
    private const BATTERIE_MIN = 0;

    public function __construct( 
        // Permet de déterminer comment il porte les déchets
        private int $force,

        // Permet de savoir comment il se déplace
        private int $vitesse,

        // Un niveau de batterie, qui va évoluer dans le temps
        private int $batterie,
    )
    {
    }

    public function batteriePourDechet(int $poidsDechet): int
    {
        // Force supérieure ou égale au poids du déchet => 1% de batterie
        if ($this->force >= $poidsDechet) {
            return self::BATTERIE_SI_POSSIBLE_DE_SOULEVER_DECHET;
        }
        
        // Sinon, la différence * 2
        $batterieAUtiliser = ($poidsDechet - $this->force) * self::RATIO_BATTERIE_POUR_SOULEVER_DECHET;

        // Je ne dois pas dépasser la moitié de la batterie
        if ($batterieAUtiliser > ($this->batterie / 2)) {
            return self::BATTERIE_SI_PAS_POSSIBLE_DE_SOULEVER_DECHET;
        }
        
        return $batterieAUtiliser;
    }

    public function getBatterie(): int
    {
        return $this->batterie;
    }

    public function rechargeLaBatterie(): void
    {
        // Si la batterie de Wall-E passe sous les 20%, il doit aller se recharger
        if ($this->batterie < self::BATTERIE_SEUIL_RECHARGE) {

            // Mais si la vitesse de Wall-E est supérieure à la batterie restante, alors il tombe en panne et le petit robot s'arrête.
            if ($this->batterie - $this->vitesse <= self::BATTERIE_MIN) {
                $this->batterie = self::BATTERIE_MIN;
                return;
            }

            //  Il se recharge à 100% et utilise à nouveau de la batterie pour revenir, le même montant (vitesse)
            $this->batterie = self::BATTERIE_MAX - $this->vitesse;
        }
    }

    /**
     * @param int[] $dechets
     */
    public function traiteDechets(array $dechets): void
    {
        foreach ($dechets as $poidsDechet) {
            if ($this->batterie === self::BATTERIE_MIN) {
                break;
            }

            $this->batterie -= $this->batteriePourDechet($poidsDechet);

            $this->rechargeLaBatterie();
        }
    }

    public function reponse(): int|string
    {
        if ($this->batterie === self::BATTERIE_MIN) {
            return 'KO';
        }

        return $this->batterie;
    }
}