<?php

use Challenges\RUGBY_1\FirstLineStrategy;
use Challenges\RUGBY_1\Player;
use Challenges\RUGBY_1\SecondLineStrategy;
use Challenges\RUGBY_1\ThirdLineStrategy;

test('Première ligne', function() {

    $player = new Player(5, 20);

    $strategy = new FirstLineStrategy;
    $impact = $strategy->calculateImpact($player);

    $this->assertEquals(150, $impact);
});

test('Deuxième ligne', function() {

    $player = new Player(5, 20);

    $strategy = new SecondLineStrategy;
    $impact = $strategy->calculateImpact($player);

    $this->assertEquals(100, $impact);
});

test('Troisième ligne', function() {

    $player = new Player(5, 20);

    $strategy = new ThirdLineStrategy;
    $impact = $strategy->calculateImpact($player);

    $this->assertEquals(75, $impact);
});