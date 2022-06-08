<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\WALL_E_solid\Battery;

final class BatteryTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_construct_getter(): void
    {
        $battery = new Battery(90);

        $this->assertEquals(
            90,
            $battery->getLevel()
        );
    }

    /**
     * @return array<int, array<int, bool|int>>
     */
    public function providerDown(): array
    {
        return [
            [10, false],
            [1, false],
            [0, true],
            [-2, true]
        ];
    }

    /**
     * @dataProvider providerDown
     */
    public function test_down(int $batteryLevel, bool $result): void
    {
        $battery = new Battery($batteryLevel);

        $this->assertEquals(
            $result,
            $battery->isDown()
        );
    }

    public function test_consume(): void
    {
        $battery = new Battery(100);
        $battery->consume(10);

        $this->assertEquals(
            90,
            $battery->getLevel()
        );
    }

    /**
     * @return array<int, array<int, int>>
     */
    public function providerRecharge(): array
    {
        // Vitesse - batterie initiale - batterie après recharge
        return [
            [10, 50, 50], // Pas de recharge
            [10, 20, 20], // Pas de recharge
            [10, 18, 90], // Recharge OK
            [10, 11, 90], // Recharge OK tout juste
            [10, 10, 0] // Recharge KO, batterie tombe à 0
        ];
    }

    /**
     * @dataProvider providerRecharge
     */
    public function test_recharge(int $speed, int $batteryStart, int $batteryEnd): void
    {
        $battery = new Battery($batteryStart);

        $battery->recharge($speed);

        $this->assertEquals(
            $batteryEnd,
            $battery->getLevel()
        );
    }

}