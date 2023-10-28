<?php
declare(strict_types=1);

namespace Challenges\GOT_1;

class TroopsFactory
{
    public static function recruit(string $className, int $army): Troops
    {
        if (! class_exists('Challenges\\GOT_1\\Troops\\' . $className)) {
            throw new \Exception('La classe ' . $className . ' n\'existe pas');
        }

        $class = 'Challenges\\GOT_1\\Troops\\' . $className;
        $instance = new $class($army);

        // Pour PHPStan
        assert($instance instanceof Troops);
    
        return $instance;
    }
}