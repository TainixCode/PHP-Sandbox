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

    /**
     * @var array<string, int> $prices
     */
    private array $prices;

    /**
     * @param array<int, string> $informations
     */
    public function setPrices(array $informations): void
    {
        $this->prices = [];
        
        foreach ($informations as $information) {
            [$name, $price] = explode(':', $information);

            $this->prices[$name] = (int) $price;
        }
    }

    /**
     * @param array<int, string> $ingredients
     * @return array<int, int>
     */
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