<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\PIZZAS\IngredientsPrices;

final class IngredientsPricesTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();

        $ingredients = ['tomates:1', 'champignons:2', 'mozzarella:3', 'serrano:4', 'chorizo:4'];
		IngredientsPrices::getInstance()->setPrices($ingredients);
	}

	// TES METHODES DE TEST ---------------------
    public function test_recuperation_1_prix(): void
    {
        $this->assertEquals(
            1,
            IngredientsPrices::getInstance()->getPriceByName('tomates')
        );
    }

    public function test_ingredient_inexistant(): void
    {
        $this->assertEquals(
            0,
            IngredientsPrices::getInstance()->getPriceByName('saumon')
        );
    }

    public function test_recuperation_tableau_de_prix(): void
    {
        $this->assertEquals(
            [2, 3, 4],
            IngredientsPrices::getInstance()->getPricesForIngredients(['champignons', 'mozzarella', 'serrano'])
        );
    }
}