<?php
declare(strict_types=1);

namespace Challenges\PIZZAS\PIZZAIOLOS;

use Challenges\PIZZAS\Pizzaiolo;

final class Raphael extends Pizzaiolo
{
    public function calculPrice(): int
    {
        return 10 + min($this->prices) + max($this->prices);
    }
}