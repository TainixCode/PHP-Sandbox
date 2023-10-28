<?php

use Challenges\GOT_1\Troops\Dothrakis;
use Challenges\GOT_1\Troops\Dragons;
use Challenges\GOT_1\Troops\Immacules;
use Challenges\GOT_1\TroopsFactory;

test('Factory', function(string $className, string $completeClassName) {
    $troops = TroopsFactory::recruit($className, 1000);

    $this->assertInstanceOf($completeClassName, $troops);
})->with([
    ['Dragons', Dragons::class],
    ['Immacules', Immacules::class],
    ['Dothrakis', Dothrakis::class],
]);