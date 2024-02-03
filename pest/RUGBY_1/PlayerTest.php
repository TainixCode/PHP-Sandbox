<?php

use Challenges\RUGBY_1\Player;

test('parsing', function() {

    $informations = '1:2';

    $player = Player::createFromText($informations);

    $this->assertEquals(1, $player->poids);
    $this->assertEquals(2, $player->force);
});

test('impact', function() {

    $player = new Player(2, 3);
    $this->assertEquals(6, $player->impact());
});