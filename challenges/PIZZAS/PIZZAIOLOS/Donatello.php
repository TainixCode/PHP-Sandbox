<?php
declare(strict_types=1);

namespace Challenges\PIZZAS\PIZZAIOLOS;

use Challenges\PIZZAS\Pizzaiolo;

final class Donatello extends Pizzaiolo
{
    public function calculPrice(): int
    {
        return max($this->prices) * 5;
    }
}