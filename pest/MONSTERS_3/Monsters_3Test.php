<?php
declare(strict_types=1);

use Challenges\MONSTERS_3\FoodType;
use Challenges\MONSTERS_3\Monster;

test('Parsing et création d\'un Monster', function() {

    $informations = 'Luxo18:F:33';

    $monster = Monster::createFromText($informations);

    expect($monster->name)->toBe('Luxo18');
    expect($monster->foodType)->toBe(FoodType::FRUITS);
    expect($monster->weight)->toBe(33);
});