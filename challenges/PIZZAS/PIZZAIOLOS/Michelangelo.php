<?php
declare(strict_types=1);

namespace Challenges\PIZZAS\PIZZAIOLOS;

use Challenges\PIZZAS\Pizzaiolo;

final class Michelangelo extends Pizzaiolo
{
    public function calculPrice(): int
    {
        rsort($this->prices);
        return array_sum(array_slice($this->prices, 0, 2)) * 3;
    }
}