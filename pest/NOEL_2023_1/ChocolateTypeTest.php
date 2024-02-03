<?php
declare(strict_types=1);

use Challenges\NOEL_2023_1\ChocolateType;

test('La température augmente de 5 pour le chocolat noir', function () {
    $temperature = ChocolateType::NOIR->modifyTemperature(0);
    expect($temperature)->toBe(5);
});

test('La température augmente de 10 pour le chocolat au lait', function () {
    $temperature = ChocolateType::AU_LAIT->modifyTemperature(0);
    expect($temperature)->toBe(10);
});

test('La température augmente de 15 pour le chocolat blanc', function () {
    $temperature = ChocolateType::BLANC->modifyTemperature(0);
    expect($temperature)->toBe(15);
});

test('La température augmente de 12 pour le mélange de chocolat', function () {
    $temperature = ChocolateType::MELANGE->modifyTemperature(0);
    expect($temperature)->toBe(12);
});

test('Tous les cas sont bien paramétrés dans modifyTemperature', function () {
    $initialTemperature = 10; // Une température initiale arbitraire
    foreach (ChocolateType::cases() as $chocolateType) {
        $chocolateType->modifyTemperature($initialTemperature);
    }

    // Si je n'ai pas rencontré d'erreur dans la boucle, cela signfie que tous les cas sont bien gérés
    $this->assertTrue(true);
});