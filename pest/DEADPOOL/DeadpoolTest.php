<?php

use Challenges\DEADPOOL\Clock;
use Challenges\DEADPOOL\Deadpool;

test('effet rien', function() {

    $deadpool = new Deadpool;
    $deadpool->step(Deadpool::STEP_NOTHING);

    $this->assertEquals(
        10,
        $deadpool->time
    );
});

test('effet soldat', function() {

    $deadpool = new Deadpool;
    $deadpool->step(Deadpool::STEP_SOLDIERS);

    $this->assertEquals(
        10,
        $deadpool->time
    );

    $this->assertEquals(
        90,
        $deadpool->hp
    );
});

test('effet soldat puis rien', function() {

    $deadpool = new Deadpool;
    $deadpool->step(Deadpool::STEP_SOLDIERS);
    $deadpool->step(Deadpool::STEP_NOTHING);

    $this->assertEquals(
        20,
        $deadpool->time
    );

    $this->assertEquals(
        95,
        $deadpool->hp
    );
});

test('trois étapes', function() {

    $deadpool = new Deadpool;
    $deadpool->step(Deadpool::STEP_SOLDIERS);
    $deadpool->step(Deadpool::STEP_NOTHING);
    $deadpool->step(Deadpool::STEP_HEAVY_WEAPONS);

    $this->assertEquals(
        50,
        $deadpool->time
    );

    $this->assertEquals(
        70,
        $deadpool->hp
    );
});

test('effet explosion', function() {

    $deadpool = new Deadpool;
    $deadpool->step(Deadpool::STEP_EXPLOSION);

    $this->assertEquals(
        300,
        $deadpool->time
    );

    $this->assertEquals(
        100,
        $deadpool->hp
    );
});

test('conversion en minutes secondes', function($time, $result) {

    $this->assertEquals(
        $result,
        Clock::minutesAndSeconds($time)
    );

})->with([
    [80, '1min_20sec'],
    [120, '2min_0sec'],
    [40, '0min_40sec']
]);


test('jeu de données', function() {
    $steps = 'S__TTHTH_H_TSE_';

    $deadpool = new Deadpool;
    $deadpool->steps($steps);

    $this->assertEquals(
        '25min_40sec_100hp',
        $deadpool->getResult()
    );
});