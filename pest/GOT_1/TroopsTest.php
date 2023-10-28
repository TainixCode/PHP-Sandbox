<?php

/**
 * Utilisation des dataset
 * On nomme chaque dataset grâce aux clés du tableau passé à la méthode with()
 */

use Challenges\GOT_1\Troops\Dothrakis;
use Challenges\GOT_1\Troops\Dragons;
use Challenges\GOT_1\Troops\Immacules;

test('Mécanique des Dragons', function(int $army, int $nbTroops) {
    $dragons = new Dragons($army);
    $dragons->calculNumberOfTroops();

    $this->assertEquals($nbTroops, $dragons->getNbTroops());
})->with([
    '3 Dragons max' => [1_000_000, 3],
    '3 Dragons exactement' => [9000, 3],
    '2 Dragons seulement' => [8999, 2],
    '2 Dragons encore' => [6000, 2],
    '1 Dragon seulement' => [5999, 1],
    '1 Dragon encore' => [3000, 1],
    'aucun Dragon' => [2999, 0],
    'aucun Dragon toujours' => [1670, 0],
    'rien à combattre' => [0, 0],
]);

test('Mécanique des Immaculés', function(int $army, int $nbTroops) {
    $immacules = new Immacules($army);
    $immacules->calculNumberOfTroops();

    $this->assertEquals($nbTroops, $immacules->getNbTroops());
})->with([
    '200 immaculés max' => [1_000_000, 200],
    'exemple issu de l\'énoncé' => [2300, 76],
    '2 Immaculés' => [60, 2],
    '1 Immaculé' => [59, 1],
    '1 Immaculé encore' => [30, 1],
    'aucun Immaculé' => [29, 0],
    'aucun Immaculé toujours' => [15, 0],
    'rien à combattre' => [0, 0],
]);


test('Mécanique des Dothrakis', function(int $army, int $nbTroops) {
    $dothrakis = new Dothrakis($army);
    $dothrakis->calculNumberOfTroops();

    $this->assertEquals($nbTroops, $dothrakis->getNbTroops());
})->with([
    '5000 Dothrakis max' => [1_000_000, 5000],
    'X Dothrakis' => [372, 372],
    'rien à combattre' => [0, 0],
]);