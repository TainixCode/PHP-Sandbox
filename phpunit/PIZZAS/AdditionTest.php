<?php
declare(strict_types=1);

use Challenges\PIZZAS\Addition;
use PHPUnit\Framework\TestCase;
use Challenges\PIZZAS\IngredientsPrices;

final class AdditionTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();

		$ingredients = ['tomates:1', 'champignons:2', 'chevre:2', 'oeuf:3', 'mozzarella:3', 'serrano:4', 'chorizo:4'];
		IngredientsPrices::getInstance()->setPrices($ingredients);
	}
	
	public function test_une_addition(): void
    {
        $pizzas = [
            'tomates,champignons,mozzarella,chorizo', // [1,2,3,4]
            'oeuf,mozzarella,serrano', // [3,3,4]
            'tomates,mozzarella,chevre,serrano', // [1,3,3,4]
            'champignons,oeuf,chorizo' // [2,3,4]
        ];
        $pizzaiolos = ['leonardo', 'donatello', 'michelangelo', 'raphael'];

        $addition = new Addition($pizzas, $pizzaiolos);

        $this->assertEquals(
            10 + 20 + 21 + 16,
            $addition->getTotal()
        );
    }

    public function test_une_addition_compliquee(): void
    {
        /**
         * Jeu de données issu directement de https://tainix.fr/challenge/YOLO-les-Pizzaiolos
         */
        $ingredients = ['tomates:1', 'champignons:1', 'mozzarella:3', 'jambon:2', 'serrano:5', 'chevre:3', 'oeuf:2', 'chorizo:5', 'saumon:5', 'basilic:2', 'oignons:1', 'poivron:1', 'salade:3', 'anchois:2', 'olive:2', 'ananas:5'];
        $pizzas = ['serrano,tomates,basilic,serrano,jambon', 'mozzarella,tomates,oignons,ananas', 'chevre,mozzarella,jambon,mozzarella', 'serrano,anchois,chorizo,oeuf', 'salade,saumon,jambon', 'chevre,serrano,anchois,poivron,poivron,mozzarella', 'saumon,champignons,tomates,anchois,serrano,salade', 'ananas,champignons,tomates', 'poivron,tomates,ananas,anchois', 'jambon,tomates,poivron,salade,olive,jambon', 'serrano,olive,mozzarella,champignons', 'anchois,oignons,basilic,anchois,oignons,chevre', 'champignons,anchois,champignons,tomates,tomates,saumon'];
        $pizzaiolos = ['leonardo', 'leonardo', 'michelangelo', 'donatello', 'raphael', 'leonardo', 'raphael', 'donatello', 'leonardo', 'leonardo', 'donatello', 'donatello', 'raphael'];

        IngredientsPrices::getInstance()->setPrices($ingredients);
        $addition = new Addition($pizzas, $pizzaiolos);

        $this->assertEquals(
            217,
            $addition->getTotal()
        );
    }
}