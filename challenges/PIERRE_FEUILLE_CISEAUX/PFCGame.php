<?php
declare(strict_types=1);

namespace Challenges\PIERRE_FEUILLE_CISEAUX;

final class PFCGame
{
	private const PIERRE = 'P';
	private const FEUILLE = 'F';
	private const CISEAUX = 'C';

	public function play(string $play): string
	{
		if ($play === self::PIERRE) {
			return self::FEUILLE;
		}

		if ($play === self::FEUILLE) {
			return self::CISEAUX;
		}

		if ($play === self::CISEAUX) {
			return self::PIERRE;
		}

		return '';
	}

	public function party(string $plays): string
	{
		$response = '';
		$nbPlays = strlen($plays) - 1;

		for ($i = 0; $i <= $nbPlays; $i++) {
			$response .= $this->play($plays[$i]);
		}

		return $response;
	}
}