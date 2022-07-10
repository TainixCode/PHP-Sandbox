<?php
declare(strict_types=1);

use Challenges\TRAIN_1\Travel;
use PHPUnit\Framework\TestCase;

final class TravelTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

    public function test_few_events(): void
    {
        $events = 'T_NN__T__T__T__P__T_T';
        $distance = 871;

        $travel = new Travel($distance, $events);

        $this->assertEquals(
            28818,
            $travel->calculate()
        );
    }

    public function test_few_events_bis(): void
    {
        $events = 'T_NN__T__T__T__P__T_T';
        $distance = 871;

        $travel = new Travel($distance, $events);

        $this->assertEquals(
            28818,
            $travel->calculate2()
        );
    }

    public function test_few_events_ter(): void
    {
        $events = 'T_NN__T__T__T__P__T_T';
        $distance = 871;

        $travel = new Travel($distance, $events);

        $this->assertEquals(
            28818,
            $travel->calculate3()
        );
    }
}