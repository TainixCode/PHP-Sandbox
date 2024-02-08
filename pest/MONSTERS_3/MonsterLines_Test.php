<?php
declare(strict_types=1);

use Challenges\MONSTERS_3\FoodType;
use Challenges\MONSTERS_3\MonstersLines;
use Challenges\MONSTERS_3\MonstersLinesWC;

test('Tri des monstres FRUITS', function(string $className) {

    $monsters = ['Drex29:F:16', 'Traz65:W:74', 'Blit86:R:27', 'Brux18:F:83', 'Cobi82:R:72', 'Brux61:F:56', 'Draz68:G:97'];

    $monsterLine = new $className;

    foreach ($monsters as $monsterInformations) {
        $monsterLine->addMonsterFromText($monsterInformations);
    }

    expect($monsterLine->getMonstersFromFoodType(FoodType::FRUITS, 3))->toBe('Drex29-Brux61-Brux18');
})->with([
    [MonstersLinesWC::class],
    [MonstersLines::class]
]);


test('Tri des monstres ROCK', function(string $className) {

    $monsters = ['Drex29:R:16', 'Traz65:W:74', 'Blit86:R:27', 'Brux18:F:83', 'Cobi82:R:72', 'Brux61:F:56', 'Draz68:G:97'];

    $monsterLine = new $className;

    foreach ($monsters as $monsterInformations) {
        $monsterLine->addMonsterFromText($monsterInformations);
    }

    expect($monsterLine->getMonstersFromFoodType(FoodType::ROCK, 3))->toBe('Cobi82-Blit86-Drex29');
})->with([
    [MonstersLinesWC::class],
    [MonstersLines::class]
]);

test('Jeu de données complet', function (string $className) {

    // Données issues de Tainix directement --------
    $monsters = ['Zela56:W:49', 'Fluz56:W:40', 'Cobi12:R:63', 'Truz57:F:69', 'Chir23:F:18', 'Moxa15:R:33', 'Vrip15:W:55', 'Moxa72:W:54', 'Trex43:W:23', 'Spro49:R:75', 'Spro80:G:36', 'Brop35:W:60', 'Draz89:R:15', 'Flix26:F:97', 'Plor65:F:21', 'Fero70:G:51', 'Gloz30:R:59', 'Flix61:G:24', 'Vlaz59:R:90', 'Drin34:R:64', 'Chir96:R:99', 'Moxa73:W:50', 'Zorp31:F:74', 'Fluz86:W:12', 'Vlox73:G:34'];
    $result = 'Chir23-Plor65-Truz57-Flix61-Vlox73-Spro80-Chir96-Vlaz59-Spro49-Brop35-Vrip15-Moxa72';
    // ---------------------------------------------

    $monsterLine = new $className;

    foreach ($monsters as $monsterInformations) {
        $monsterLine->addMonsterFromText($monsterInformations);
    }

    expect($monsterLine->getAllFirstThree())->toBe($result);
})->with([
    [MonstersLinesWC::class],
    [MonstersLines::class]
]);