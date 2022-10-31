<?php
declare(strict_types=1);

namespace Challenges\PIZZAS\PIZZAIOLOS;

use Challenges\PIZZAS\Pizzaiolo;

final class Leonardo extends Pizzaiolo
{
    public function calculPrice(): int
    {
        return array_sum($this->prices);
    }
}