<?php

use Challenges\GOT_1\Commandant;

/**
 * J'ai construit ces 4 tests grâce aux jeux de données proposés sur la page du challenge
 */

test('Commandant', function(int $army, string $composition) {
    $daenerys = new Commandant($army);
    $daenerys->determineTroops(['Dragons', 'Immacules', 'Dothrakis']);

    $this->assertEquals($composition, $daenerys->getComposition());
})->with([
    [9887, '3_200_3887'],
    [7909, '2_196_2969'],
    [5855, '1_161_2440'],
    [2960, '0_98_1490'],
]);