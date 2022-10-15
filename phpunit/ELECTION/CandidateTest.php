<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\ELECTION\Candidate;

final class CandidateTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	public function test_construct(): void
    {
        $candidate = new Candidate('A');

        $this->assertEquals(
            'A',
            $candidate->getName()
        );

        $this->assertEquals(
            0,
            $candidate->getVotes()
        );
    }

    public function test_addVote_1(): void
    {
        $candidate = new Candidate('A');
        $candidate->addVote();

        $this->assertEquals(
            1,
            $candidate->getVotes()
        );
    }

    public function test_addVote_many(): void
    {
        $candidate = new Candidate('A');
        $candidate->addVote(3);
        $candidate->addVote();
        $candidate->addVote(2);

        $this->assertEquals(
            3 + 1 + 2,
            $candidate->getVotes()
        );
    }

    public function test_error_division_by_zero()
    {
        $candidate = new Candidate('A');
        $candidate->addVote(3);

        $this->expectException('Exception');

        $candidate->getPourcentage(0);
    }
}