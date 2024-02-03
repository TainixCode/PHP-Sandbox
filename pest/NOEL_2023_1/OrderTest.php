<?php
declare(strict_types=1);

use Challenges\NOEL_2023_1\Event;
use Challenges\NOEL_2023_1\Order;
use Challenges\NOEL_2023_1\SpiceType;
use Challenges\NOEL_2023_1\ChocolateType;

test('Exemple de parsing pour créer correctement une instance de Order', function () {

    $order = Order::createFromText('10,noir,cannelle,chocolat_brule');

    expect($order->getTemperature())->toBe(10);
    expect($order->chocolateType)->toBe(ChocolateType::NOIR);
    expect($order->spiceType)->toBe(SpiceType::CANNELLE);
    expect($order->event)->toBe(Event::CHOCOLAT_BRULE);
});

test('Exemple de parsing pour créer correctement une instance de Order sans évènement', function () {

    $order = Order::createFromText('10,blanc,vanille');

    expect($order->getTemperature())->toBe(10);
    expect($order->chocolateType)->toBe(ChocolateType::BLANC);
    expect($order->spiceType)->toBe(SpiceType::VANILLE);
    expect($order->event)->toBeNull();
});

test('Calcul de température #1', function () {

    $order = Order::createFromText('10,noir,cannelle,chocolat_brule');
    $order->modifyTemperature();

    expect($order->getTemperature())->toBe(9); // 10 + 5 + 4 - 10
});

test('Calcul de température #2 - sans évènement', function () {

    $order = Order::createFromText('10,blanc,vanille');
    $order->modifyTemperature();
    
    expect($order->getTemperature())->toBe(26); // 10 + 15 + 1
});