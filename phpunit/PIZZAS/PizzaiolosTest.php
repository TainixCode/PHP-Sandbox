<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\PIZZAS\PizzaioloFactory;
use Challenges\PIZZAS\IngredientsPrices;
use Challenges\PIZZAS\Pizzaiolo;
use Challenges\PIZZAS\PIZZAIOLOS\Leonardo;

final class PizzaiolosTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();

		$ingredients = ['tomates:1', 'champignons:2', 'mozzarella:3', 'serrano:4', 'chorizo:4'];
		IngredientsPrices::getInstance()->setPrices($ingredients);
	}

	public function test_factory(): void
	{
		$leonardo = PizzaioloFactory::engage('leonardo');

		$this->assertInstanceOf(
			Pizzaiolo::class,
			$leonardo
		);

		$this->assertInstanceOf(
			Leonardo::class,
			$leonardo
		);
	}
	
	public function test_leonardo(): void
	{
		$leonardo = PizzaioloFactory::engage('leonardo');
		$leonardo->setPrices(['tomates', 'champignons', 'mozzarella', 'serrano']); // [1, 2, 3, 4]

		$this->assertEquals(
			10,
			$leonardo->calculPrice()
		);
	}

	public function test_donatello(): void
	{
		$donatello = PizzaioloFactory::engage('donatello');
		$donatello->setPrices(['tomates', 'champignons', 'mozzarella', 'serrano']); // [1, 2, 3, 4]

		$this->assertEquals(
			20,
			$donatello->calculPrice()
		);
	}

	public function test_michelangelo_1(): void
	{
		$michelangelo = PizzaioloFactory::engage('michelangelo');
		$michelangelo->setPrices(['tomates', 'champignons', 'mozzarella', 'serrano']); // [1, 2, 3, 4]

		$this->assertEquals(
			21,
			$michelangelo->calculPrice()
		);
	}

	public function test_michelangelo_2(): void
	{
		$michelangelo = PizzaioloFactory::engage('michelangelo');
		$michelangelo->setPrices(['tomates', 'champignons', 'mozzarella', 'serrano', 'chorizo']); // [1, 2, 3, 4, 4]

		$this->assertEquals(
			24,
			$michelangelo->calculPrice()
		);
	}

	public function test_raphael(): void
	{
		$raphael = PizzaioloFactory::engage('raphael');
		$raphael->setPrices(['tomates', 'champignons', 'mozzarella', 'serrano']); // [1, 2, 3, 4]

		$this->assertEquals(
			15,
			$raphael->calculPrice()
		);
	}
}