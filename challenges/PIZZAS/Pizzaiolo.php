<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

abstract class Pizzaiolo
{
    /**
     * @var array<int, int> $prices
     */
    protected array $prices;

    abstract function calculPrice(): int;

    /**
     * @param array<int, string> $ingredients
     */
    public function setPrices(array $ingredients): void
    {
        $this->prices = IngredientsPrices::getInstance()->getPricesForIngredients($ingredients);
    }
}