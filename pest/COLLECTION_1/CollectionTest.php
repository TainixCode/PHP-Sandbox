<?php
declare(strict_types=1);

use Challenges\COLLECTION_1\Collection;
use Challenges\COLLECTION_1\Figurine;

/**
 * Jeux de données
 */
$exemplaires = [50, 5000];
$cotes = [1.5, 2.5];
$collection = new Collection($exemplaires, $cotes);

test('on instancie bien des Figurines', function() use ($collection) {

    $this->assertInstanceOf(
        Figurine::class,
        $collection->getFigurines()[0]
    );
});

test('total d\'achat', function() use ($collection) {

    $this->assertEquals(
        30 + 15,
        $collection->getTotalPriceBuy()
    );
});

test('total du prix de vente',  function() use ($collection) {
    
    $this->assertEquals(
        30 * 1.5 + 15 * 2.5,
        $collection->getTotalPriceSell()
    );
});

/**
 * Jeux de données complexe issu de Tainix diretement
 */
test('jeu de données complet', function() {

    $exemplaires = [50, 50, 50000, 2000, 50000, 2000, 2000, 2000, 50000, 2000, 2000, 50000, 50000, 2000, 2000, 2000, 50000];
    $cotes = [2, 8, 1, 0.6, 1, 1.2, 1, 0.6, 0.6, 1, 1, 1, 0.8, 1.2, 1, 1, 0.6];

    $collection = new Collection($exemplaires, $cotes);

    $this->assertEquals(
        219, // Réponse fournie par Tainix
        $collection->getTotalDifference()
    );
});