<?php
declare(strict_types=1);

namespace Challenges\MARIO_1_heritage;

class Level
{
    private const PLATFORM = 'P';

    private string $sequence = '';
    private Jumper $currentJumper;

    public function __construct(
        private string $platfoms,
        private Jumper $jumper1,
        private Jumper $jumper2
    ) {
        $this->currentJumper = $jumper1;
    }

    public function run(): void
    {
        $gaps = explode(self::PLATFORM, $this->platfoms);
        
        foreach ($gaps as $gap) {

            $gapLength = strlen($gap);

            if ($gapLength === 0) {
                // Bords, personne ne saute
                continue;
            }
            
            // Si les 2 peuvent sauter
            if ($this->jumper1->canJump($gapLength) && $this->jumper2->canJump($gapLength)) {
                // On incrémente la séquence avec le jumper courant
                $this->sequence .= $this->currentJumper->name;

                // On change de currentJumper
                if ($this->currentJumper->name === $this->jumper1->name) {
                    $this->currentJumper = $this->jumper2;
                } else {
                    $this->currentJumper = $this->jumper1;
                }

                continue;
            }

            if ($this->jumper1->canJump($gapLength)) {
                $this->sequence .= $this->jumper1->name;

                continue;
            }

            if ($this->jumper2->canJump($gapLength)) {
                $this->sequence .= $this->jumper2->name;

                continue;
            }
        }
    }

    public function getSequence(): string
    {
        return $this->sequence;
    }
}