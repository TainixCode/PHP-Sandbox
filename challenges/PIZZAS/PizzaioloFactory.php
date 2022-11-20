<?php
declare(strict_types=1);

namespace Challenges\PIZZAS;

final class PizzaioloFactory
{
    public static function engage(string $name): Pizzaiolo
    {
        $classPizzaiolo = 'Challenges\\PIZZAS\\PIZZAIOLOS\\' . ucfirst($name);

        if (! class_exists($classPizzaiolo)) {
            throw new \Exception('Ce Pizzaiolo n\'est pas paramétré');
        }

        /**
         * @var Pizzaiolo $pizzaiolo
         */
        $pizzaiolo = new $classPizzaiolo;
        return $pizzaiolo;
    }
}