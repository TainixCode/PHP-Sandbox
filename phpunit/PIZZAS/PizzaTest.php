<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\PIZZAS\IngredientsPrices;
use Challenges\PIZZAS\Pizza;

final class PizzaTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();

		$ingredients = ['tomates:1', 'champignons:2', 'mozzarella:3', 'serrano:4', 'chorizo:4'];
		IngredientsPrices::getInstance()->setPrices($ingredients);
	}
	
	public function test_une_pizza(): void
    {
        $ingredients = 'tomates,champignons,mozzarella,chorizo';
        $pizzaiolo = 'leonardo';

        $pizza = new Pizza($ingredients);
        $pizza->setPizzaiolo($pizzaiolo);

        $this->assertEquals(
            10,
            $pizza->getPrice()
        );
    }

    public function test_la_meme_pizza_avec_un_autre_pizzaiolo(): void
    {
        $ingredients = 'tomates,champignons,mozzarella,chorizo';
        $pizzaiolo = 'donatello';

        $pizza = new Pizza($ingredients);
        $pizza->setPizzaiolo($pizzaiolo);

        $this->assertEquals(
            20,
            $pizza->getPrice()
        );
    }
}