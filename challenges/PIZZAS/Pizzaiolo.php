<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

abstract class Pizzaiolo
{
    protected array $prices;

    abstract function calculPrice(): int;

    public function setPrices(array $ingredients): void
    {
        $this->prices = IngredientsPrices::getInstance()->getPricesForIngredients($ingredients);
    }
}