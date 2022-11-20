<?php
declare(strict_types=1);

namespace Challenges\COLLECTION_1;

class Collection
{
    /**
     * @var array<int, Figurine> $figurines
     */
    private array $figurines = [];

    /**
     * @param array<int, int> $informationsExemplaires
     * @param array<int, float> $informationsCotes
     */
    public function __construct(array $informationsExemplaires, array $informationsCotes)
    {
        foreach ($informationsExemplaires as $key => $exemplaires) {
            $this->figurines[] = new Figurine(
                exemplaires: $exemplaires,
                cote: $informationsCotes[$key]
            );
        }
    }

    /**
     * @return array<int, Figurine>
     */
    public function getFigurines(): array
    {
        return $this->figurines;
    }

    public function getTotalPriceBuy(): int
    {
        $total = 0;

        foreach ($this->figurines as $figurine) {
            $total += $figurine->getPriceBuy();
        }

        return $total;
    }

    public function getTotalPriceSell(): float
    {
        $total = 0;

        foreach ($this->figurines as $figurine) {
            $total += $figurine->getPriceSell();
        }

        return $total;
    }

    public function getTotalDifference(): float
    {
        return $this->getTotalPriceSell() - $this->getTotalPriceBuy();
    }
}