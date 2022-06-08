<?php
declare(strict_types=1);

namespace Challenges\FOOTBALL_3;

final class Board
{
	private const POINTS_START = 0;
	private const POINTS_VICTORY = 3;
	private const POINTS_DRAW = 1;

	public array $scores = [];

	public function __construct(array $group)
	{
		foreach ($group as $team) {
			$this->scores[$team] = self::POINTS_START;
		}
	}

	public function match(string $score): void
	{
		[$homeTeam, $awayTeam, $homeScore, $awayScore] = explode('_', $score);

		if ($homeScore > $awayScore) {
			$this->scores[$homeTeam] += self::POINTS_VICTORY;
		} elseif ($awayScore > $homeScore) {
			$this->scores[$awayTeam] += self::POINTS_VICTORY;
		} else {
			$this->scores[$homeTeam] += self::POINTS_DRAW;
			$this->scores[$awayTeam] += self::POINTS_DRAW;
		}
	}

	public function matchs(array $scores): void
	{
		foreach ($scores as $score) {
			$this->match($score);
		}

		// En 1 ligne :
		// array_map([$this, 'match'], $scores);
	}

	public function getOrder(): string
	{
		arsort($this->scores);
		return implode('', array_keys($this->scores));
	}
}