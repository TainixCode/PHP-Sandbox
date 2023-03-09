<?php
declare(strict_types=1);

namespace Challenges\CODE_LANTA;

class Passengers
{
    public function __construct(
        /**
         * @var string[] $names
         */
        public array $names
    ) {}

    public function getInitials(): string
    {
        $out = '';

        foreach ($this->names as $name) {
            $out .= $name[0];
        }

        return $out;
    }
}