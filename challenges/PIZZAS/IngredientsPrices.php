<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

final class IngredientsPrices
{
    /**
     * Elements propres au Pattern SINGLETON --------
     */
    protected function __construct() {}

    private static ?IngredientsPrices $instance = null;

    public static function getInstance(): IngredientsPrices
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
    /**
     * ----------------------------------------------
     */

    private array $prices;

    public function setPrices(array $informations)
    {
        $this->prices = [];
        
        foreach ($informations as $information) {
            [$name, $price] = explode(':', $information);

            $this->prices[$name] = (int) $price;
        }
    }

    public function getPricesForIngredients(array $ingredients): array
    {
        return array_map([$this, 'getPriceByName'], $ingredients);
    }

    public function getPriceByName(string $name): int
    {
        if (empty($this->prices)) {
            throw new \Exception('Les prix n\'ont pas encore été déclarés.');
        }

        return $this->prices[$name] ?? 0;
    }
}