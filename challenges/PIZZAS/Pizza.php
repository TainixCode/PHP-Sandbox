<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

final class Pizza
{
    private array $ingredients;

    private Pizzaiolo $pizzaiolo;
    
    public function __construct(string $informations)
    {
        $this->ingredients = explode(',', $informations);
    }

    public function setPizzaiolo(string $name): void
    {
        $this->pizzaiolo = PizzaioloFactory::engage($name);
        $this->pizzaiolo->setPrices($this->ingredients);
    }

    public function getPrice(): int
    {
        return $this->pizzaiolo->calculPrice();
    }
}