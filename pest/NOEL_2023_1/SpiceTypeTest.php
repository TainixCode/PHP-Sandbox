<?php
declare(strict_types=1);

use Challenges\NOEL_2023_1\SpiceType;

test('La température augmente de 4 pour la cannelle', function () {
    $temperature = SpiceType::CANNELLE->modifyTemperature(0);
    expect($temperature)->toBe(4);
});

test('La température augmente de 7 pour la muscade', function () {
    $temperature = SpiceType::MUSCADE->modifyTemperature(0);
    expect($temperature)->toBe(7);
});

test('La température augmente de 9 pour le piment', function () {
    $temperature = SpiceType::PIMENT->modifyTemperature(0);
    expect($temperature)->toBe(9);
});

test('La température augmente de 1 pour la vanille', function () {
    $temperature = SpiceType::VANILLE->modifyTemperature(0);
    expect($temperature)->toBe(1);
});

test('Tous les cas sont bien paramétrés dans modifyTemperature', function () {
    $initialTemperature = 10; // Une température initiale arbitraire
    foreach (SpiceType::cases() as $spiceType) {
        $spiceType->modifyTemperature($initialTemperature);
    }

    // Si je n'ai pas rencontré d'erreur dans la boucle, cela signifie que tous les cas sont bien gérés
    $this->assertTrue(true);
});
