<?php
namespace Tainix;

use Tainix\Html;
use GuzzleHttp\Client;

final class Game
{	
	private const BASE_URL = 'https://tainix.fr/';

	private string $codeEngine;
	private string $key;
	private string $token;

	public function __construct(string $key, string $codeEngine)
	{
		$this->key = $key;
		$this->codeEngine = $codeEngine;
	}
	
	/**
	 * @return array<string, mixed>
	 */
	public function input(): array
	{
		$data = $this->request('api/games/start/' . $this->key . '/' . $this->codeEngine);

		$this->token = $data['token'];
		
		return $data['input'];
	}

	/**
	 * @param array<string, mixed> $dataPlayer
	 */
	public function output(array $dataPlayer): void
	{
		if (!isset($dataPlayer['data'])) {
			$this->errors(['Votre tableau de retour doit contenir une cle "data"']);
			return;
		}

		$dataPlayer = json_encode($dataPlayer);

		if ($dataPlayer === false) {
			$this->errors(['Erreur dans la structure des données.']);
			return;
		}

		$dataPlayer = base64_encode($dataPlayer);
		
		$data = $this->request('api/games/response/' . $this->token . '/' . $dataPlayer);

		$class = $data['game_success'] ? 'success' : 'danger';

		echo Html::quote('<b>' . $data['game_message'] . '</b>', $class);
		echo Html::quote('Le Token de ta Game :</b> <a href="' . self::BASE_URL . 'games/story/' . $this->token . '" target="_blank">' . $this->token . '</a>');
	}

	/**
	 * @return array<string, mixed>
	 */
	private function request(string $url): array
	{
		$client = new Client(['verify' => false]);
		$request = $client->request('GET', self::BASE_URL . $url);

		if ($request->getStatusCode() != 200) {
			$this->errors(['Connexion à Tainix impossible']);
			return [];
		}

		$data = json_decode($request->getBody(), true);

		if (!$data['success']) {
			$this->errors($data['errors']);
		}

		return $data;
	}

	/**
	 * @param string|string[] $errors
	 */
	private function errors($errors): void
	{
		foreach ((array) $errors as $error) {
			echo '<p><b>Erreur : </b> ' . $error . '</p>';
		}

		return;
	}
}