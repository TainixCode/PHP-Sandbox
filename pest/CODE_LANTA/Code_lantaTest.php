<?php
declare(strict_types=1);

use Challenges\CODE_LANTA\Plane;
use Challenges\CODE_LANTA\Passengers;

test('initiales des passagers', function() {

    $names = ['Arthur', 'Martin', 'Marie', 'Claire'];

    $passengers = new Passengers($names);
    $this->assertEquals(
        'AMMC',
        $passengers->getInitials()
    );
});

test('déplacement de l\'avion', function() {

    $plane = new Plane(1,1);

    $moves = ['x:1', 'y:2'];

    $plane->moves($moves);

    $this->assertEquals(
        '2;3',
        $plane->getPosition()
    );
});

test('déplacement de l\'avion négatif', function() {

    $plane = new Plane(1,1);

    $moves = ['x:-1', 'y:-2'];

    $plane->moves($moves);

    $this->assertEquals(
        '0;-1',
        $plane->getPosition()
    );
});

test('jeu de données', function() {

    $names = ['David', 'Agathe', 'Mia', 'Sylvie', 'Amelie', 'Leon', 'Sylvie', 'Alix', 'Pierre'];
    $x = 0;
    $y = -1;
    $moves = ['x:10', 'x:10', 'y:2', 'y:6', 'x:5', 'y:8', 'x:-2', 'x:0', 'x:-6', 'y:-4', 'x:-3', 'y:4'];

    $passengers = new Passengers($names);
    $plane = new Plane($x, $y);
    $plane->moves($moves);

    $message = 'SOS:'. $passengers->getInitials() . '_PLACE:' . $plane->getPosition();

    $this->assertEquals(
        'SOS:DAMSALSAP_PLACE:14;15',
        $message
    );
});