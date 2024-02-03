<?php
declare(strict_types=1);

use Challenges\NOEL_2023_1\Event;

test('La température diminue de 10 pour un chocolat brûlé', function () {
    $temperature = Event::CHOCOLAT_BRULE->modifyTemperature(20);
    expect($temperature)->toBe(10);
});

test('La température augmente de 10 pour une épice surprise', function () {
    $temperature = Event::EPICE_SURPRISE->modifyTemperature(10);
    expect($temperature)->toBe(20);
});

test('La température est doublée pour une tasse froide', function () {
    $temperature = Event::TASSE_FROIDE->modifyTemperature(10);
    expect($temperature)->toBe(20);
});

test('Tous les cas sont bien paramétrés dans modifyTemperature', function () {
    $initialTemperature = 10; // Une température initiale arbitraire
    foreach (Event::cases() as $event) {
        $event->modifyTemperature($initialTemperature);
    }

    // Si je n'ai pas rencontré d'erreur dans la boucle, cela signifie que tous les cas sont bien gérés
    $this->assertTrue(true);
});
