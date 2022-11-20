<?php
declare(strict_types=1);

namespace Challenges\COLLECTION_1;

final class Figurine
{
    private const LIMIT_RARE = 2000;
    private const PRICE_BUY_RARE = 30;
    private const PRICE_BUY_NOT_RARE = 15;

    private int $priceBuy;

    public function __construct(
        private int $exemplaires,
        private float $cote
    )
    {
        $this->calculPriceBuy();
    }

    private function calculPriceBuy(): void
    {
        if ($this->exemplaires < self::LIMIT_RARE) {
            $this->priceBuy = self::PRICE_BUY_RARE;
            return;
        }

        $this->priceBuy = self::PRICE_BUY_NOT_RARE;
    }

    public function getPriceBuy(): int
    {
        return $this->priceBuy;
    }

    public function getPriceSell(): float
    {
        return $this->priceBuy * $this->cote;
    }
}