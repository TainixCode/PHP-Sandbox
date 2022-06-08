<?php
declare(strict_types=1);

namespace Challenges\WALL_E_solid;

class Battery
{
    private const LEVEL_FOR_RECHARGE = 20;
    private const MAX = 100;
    private const MIN = 0;
    
    public function __construct(
        private int $level
    )
    {
    }

    public function recharge(int $speed): void
    {
        // Si la batterie de Wall-E passe sous les 20%, il doit aller se recharger
        if ($this->level < self::LEVEL_FOR_RECHARGE) {

            // Mais si la vitesse de Wall-E est supérieure à la batterie restante, alors il tombe en panne et le petit robot s'arrête.
            if ($this->level - $speed <= self::MIN) {
                $this->level = self::MIN;
                return;
            }

            //  Il se recharge à 100% et utilise à nouveau de la batterie pour revenir, le même montant (vitesse)
            $this->level = self::MAX - $speed;
        }
    }

    public function consume(int $battery): void
    {
        $this->level -= $battery;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isDown(): bool
    {
        return $this->level <= self::MIN;
    }
}