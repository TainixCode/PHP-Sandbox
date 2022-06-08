<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\WALL_E_solid\Robot;

final class RobotTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_result_not_ko(): void
    {
        $force = 20;
        $speed = 5;
        $batteryLevel = 98;
        $trash = [8, 13, 12, 22, 32, 15, 7, 17, 5, 5, 7, 12, 12, 32, 10, 15, 13, 15, 19, 17];

        $result = 29;

        $walle = new Robot(
            force: $force,
            speed: $speed,
            batteryLevel: $batteryLevel
        );

        $walle->handleTrash($trash);

        $this->assertEquals(
            $result,
            $walle->response(),
        );
    }

    public function test_dechets_wall_e_ko(): void
    {
        $force = 13;
        $speed = 15;
        $batteryLevel = 82;
        $trash = [15, 21, 20, 19, 14, 6, 9, 22, 14, 9, 10, 17, 33, 9, 8, 5, 22, 19, 23, 18];

        $result = 'KO';

        $walle = new Robot(
            force: $force,
            speed: $speed,
            batteryLevel: $batteryLevel
        );

        $walle->handleTrash($trash);

        $this->assertEquals(
            $result,
            $walle->response(),
        );
    }
}