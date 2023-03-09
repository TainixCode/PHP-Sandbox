<?php
declare(strict_types=1);

namespace Challenges\DEADPOOL;

class Clock
{
    public static function minutesAndSeconds(int $time): string
    {
        $min = floor($time / 60);
        $sec = $time % 60;

        return $min . 'min_' . $sec . 'sec';
    }
}