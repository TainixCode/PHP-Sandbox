<?php

use Challenges\SURVIVAL_2\Survivor;
use Challenges\SURVIVAL_2\EndOfAdventureException;

test('Zone Water', function() {
    
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->zoneWater();

    $this->assertEquals(11, $survivor->thirst);
    $this->assertEquals(99, $survivor->shape);
});

test('Zone Food', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->zoneFood();

    $this->assertEquals(11, $survivor->hunger);
    $this->assertEquals(99, $survivor->shape);
});

test('Zone Terrain Difficile', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->zoneDifficultField();

    $this->assertEquals(97, $survivor->shape);
});

test('Zone simple', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->zoneSimple();

    $this->assertEquals(99, $survivor->shape);
});

test('La nuit', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->night();

    $this->assertEquals(5, $survivor->thirst);
    $this->assertEquals(5, $survivor->hunger);
    $this->assertEquals(110, $survivor->shape);
});

test('Peut continuer', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $this->assertFalse($survivor->mustStop());
});

test('Doit s\'arrêter', function(int $thirst, int $hunger, int $shape) {
    $survivor = new Survivor(
        thirst: $thirst,
        hunger: $hunger,
        shape: $shape
    );

    $this->assertTrue($survivor->mustStop());
})->with([
    'Soif à zéro' => [0, 10, 100],
    'Faim à zéro' => [10, 0, 100],
    'Forme à zéro' => [10, 10, 0],
]);

test('Région difficile', function() {
    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 10
    );

    $this->expectException(EndOfAdventureException::class);
    $survivor->region('_________');
});

test('Région complète', function() {

    $survivor = new Survivor(
        thirst: 10,
        hunger: 10,
        shape: 100
    );

    $survivor->region('AFW_B');
    
    $this->assertEquals(11, $survivor->thirst);
    $this->assertEquals(11, $survivor->hunger);
    $this->assertEquals(93, $survivor->shape);
});

test('Calcul du résultat', function(int $thirst, int $hunger, int $shape, int $result) {
    $survivor = new Survivor(
        thirst: $thirst,
        hunger: $hunger,
        shape: $shape
    );

    $this->assertEquals(
        $result,
        $survivor->getResult()
    );
})->with([
    'Soif à zéro' => [0, 3, 4, 12],
    'Faim à zéro' => [2, 0, 4, 8],
    'Forme à zéro' => [2, 3, 0, 6],
    'Aucun zéro' => [2, 3, 4, 24],
    'Deux zéro' => [2, 0, 0, 2],
]);

test('Jeux de données', function() {

    $thirst = 20;
    $hunger = 20;
    $shape = 67;
    $island = ['WTFWWYF', 'ZR_FFAFAYWYFAET', 'ZWFAEY', 'FWYZTERFYRAFR', 'TFTER_WZEFA', 'F_RTYZRWWW', 'WAWFWZAW', 'TR_EYWEF'];

    $survivor = new Survivor(
        thirst: $thirst,
        hunger: $hunger,
        shape: $shape
    );

    $survivor->adventure($island);

    $this->assertEquals(
        255,
        $survivor->getResult()
    );
});