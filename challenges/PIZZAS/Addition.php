<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

final class Addition
{
    private int $total = 0;

    /**
     * @param array<int, string> $informationsPizzas
     * @param array<int, string> $informationsPizzaiolos
     */
    public function __construct(array $informationsPizzas, array $informationsPizzaiolos)
    {
        foreach ($informationsPizzas as $key => $informationsPizza) {
            $pizza = new Pizza($informationsPizza);
            $pizza->setPizzaiolo($informationsPizzaiolos[$key]);

            $this->total += $pizza->getPrice();
        }
    }

    public function getTotal(): int
    {
        return $this->total;
    }
}