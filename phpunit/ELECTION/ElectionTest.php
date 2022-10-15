<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Challenges\ELECTION\Election;
use Challenges\ELECTION\Candidate;

final class ElectionTest extends TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	public function test_parseVotes(): void
	{
		$election = new Election();

		$votes = 'ABCD';
		$election->parseVotes($votes);

		$this->assertEquals(
			$election->getVotes(),
			['A', 'B', 'C', 'D']
		);
	}

	public function test_parseCandidates(): void
	{
		$election = new Election();

		$candidates = 'ABC';
		$election->parseCandidates($candidates);

		$this->assertEquals(
			$election->getCandidates(),
			['A' => new Candidate('A'), 'B' => new Candidate('B'), 'C' => new Candidate('C')]
		);
	}

	public function test_filterBlankVotes(): void
	{
		$election = new Election();

		$candidates = 'ABC';
		$votes = 'AZBUBC';

		$election->parseCandidates($candidates);
		$election->parseVotes($votes);

		$election->filterBlankVotes();

		$this->assertEquals(
			$election->getVotes(),
			['A', 'B', 'B', 'C']
		);
	}

	public function test_countVotes(): void
	{
		$election = new Election();

		$candidates = 'ABCD';
		$votes = 'BAAZBUBC';

		$election->parseCandidates($candidates);
		$election->parseVotes($votes);
		$election->filterBlankVotes();
		$election->countVotes();

		$A = new Candidate('A');
		$A->addVote(2);

		$B = new Candidate('B');
		$B->addVote(3);

		$C = new Candidate('C');
		$C->addVote(1);

		$D = new Candidate('D');
		
		$this->assertEquals(
			$election->getCandidates(),
			['A' => $A, 'B' => $B, 'C' => $C, 'D' => $D]
		);
	}

	public function test_topTwo(): void
	{
		$election = new Election();

		// Données issues de https://tainix.fr/challenge/Depouillement-des-bulletins-de-vote
		$candidates = 'YKPZM';
		$votes = 'MQKMZZGVZZMYMZKYPMZZPLPPKKPPPPKMZYLGMMMPZKZZKPGPKPQMPKGZPKZMZKKZYQGPMQZSMPMKZPPKWVYJKGKPZYWPJPZKQPVKZYKPWZPYRKYZ';

		$election->parseCandidates($candidates);
		$election->parseVotes($votes);
		$election->filterBlankVotes();
		$election->countVotes();

		$this->assertEquals(
			$election->findTopTwo(),
			'P27-Z24.7'
		);
	}
}