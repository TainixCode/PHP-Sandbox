<?php
declare(strict_types=1);

use Challenges\COLLECTION_1\Figurine;

test('un prix d\'achat à 15€', function() {

    $figurine = new Figurine(exemplaires: 5000, cote: 1);

    $this->assertEquals(
        15,
        $figurine->getPriceBuy()
    );
});

test('un prix d\'achat à 30€', function() {

    $figurine = new Figurine(exemplaires: 500, cote: 1);

    $this->assertEquals(
        30,
        $figurine->getPriceBuy()
    );
});

test('un prix d\'achat à 15€ pour plein de nombres d\'exemplaires', function($exemplaires) {

    $figurine = new Figurine(exemplaires: $exemplaires, cote: 1);

    $this->assertEquals(
        15,
        $figurine->getPriceBuy()
    );
})->with(
    [2000, 2001, 2500, 5000, 10000, 50000]
);

test('un prix d\'achat à 30€ pour plein de nombres d\'exemplaires', function($exemplaires) {

    $figurine = new Figurine(exemplaires: $exemplaires, cote: 1);

    $this->assertEquals(
        30,
        $figurine->getPriceBuy()
    );
})->with(
    [1, 20, 50, 500, 1999]
);

test('un prix de vente à partir d\'une figurine non rare', function() {

    $figurine = new Figurine(exemplaires: 5000, cote: 2.5);

    $this->assertEquals(
        15 * 2.5,
        $figurine->getPriceSell()
    );
});

test('un prix de vente à partir d\'une figurine rare', function() {

    $figurine = new Figurine(exemplaires: 500, cote: 1.5);

    $this->assertEquals(
        30 * 1.5,
        $figurine->getPriceSell()
    );
});