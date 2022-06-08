<?php
declare(strict_types=1);

namespace Challenges\WALL_E_solid;

class Robot
{
    private int $speed;

    private Battery $battery;
    private Lifter $lifter;

    public function __construct(int $force, int $speed, int $batteryLevel)
    {
        $this->speed = $speed;
        $this->lifter = new Lifter($force);
        $this->battery = new Battery($batteryLevel);
    }

    /**
     * @param int[] $trash
     */
    public function handleTrash(array $trash): void
    {
        foreach ($trash as $trashWeight) {
            if ($this->battery->isDown()) {
                break;
            }

            $this->battery->consume(
                $this->lifter->getConsumedBattery($trashWeight, $this->battery->getLevel())
            );

            $this->battery->recharge($this->speed);
        }
    }

    public function response(): int|string
    {
        return $this->battery->isDown() ? 'KO' : $this->battery->getLevel();
    }

}