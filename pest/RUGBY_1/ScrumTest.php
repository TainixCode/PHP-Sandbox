<?php

use Challenges\RUGBY_1\Line;
use Challenges\RUGBY_1\Scrum;
use Challenges\RUGBY_1\FirstLineStrategy;
use Challenges\RUGBY_1\ThirdLineStrategy;
use Challenges\RUGBY_1\SecondLineStrategy;

test('Première ligne', function() {

    $lineInformations = ['5:20', '10:10'];
    $line = new Line($lineInformations, new FirstLineStrategy);

    $this->assertEquals(300, $line->impact());
});

test('Deuxième ligne', function() {

    $lineInformations = ['5:20', '10:10'];
    $line = new Line($lineInformations, new SecondLineStrategy);

    $this->assertEquals(200, $line->impact());
});

test('Troisième ligne', function() {

    $lineInformations = ['5:20', '10:10'];
    $line = new Line($lineInformations, new ThirdLineStrategy);

    $this->assertEquals(150, $line->impact());
});

test('Mélée complète', function() {

    // Données issues de Tainix
    $line1 = ['102:23', '100:35', '117:33'];
    $line2 = ['96:57', '110:58', '92:42', '90:15'];
    $line3 = ['75:93'];

    $scrum = new Scrum(
        new Line($line1, new FirstLineStrategy),
        new Line($line2, new SecondLineStrategy),
        new Line($line3, new ThirdLineStrategy),
    );

    $this->assertEquals(36857, $scrum->impact());
});