<?php
if (!file_exists('./vendor/autoload.php')) {
	die('Commence par lancer la commande "composer install"');
}

require './vendor/autoload.php';

use Tainix\App;
use \Tainix\Html;

// Sécurité
if (!isset($_GET[App::GET_KEY_TYPE]) || !isset($_GET[App::GET_KEY_CHALLENGE])) {
	header('Location: ./');
}

// Vérification présence de la key
$keyIsConfigured = true;
if ($_GET[App::GET_KEY_TYPE] == App::TYPE_API) {
	$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
	$dotenv->load();

	try {
		$dotenv->required('TAINIX_KEY');
	} catch (Exception $e) {
		$keyIsConfigured = false;
	}
}

$code = $_GET[App::GET_KEY_CHALLENGE];
$type = $_GET[App::GET_KEY_TYPE];
$challengeFile = strtolower($code);
$challengeDirectory = './challenges/' . strtoupper($code);

$quotes = [
	App::TYPE_API => 'Ces données changent à chaque affichage de cette page.',
	App::TYPE_LOCAL => 'Ces données sont figées, accéde à l\'énoncé si tu en veux d\'autres.'
];

$suffixes = [
	App::TYPE_API => App::SUFFIX_API_FILE,
	App::TYPE_LOCAL => App::SUFFIX_LOCAL_FILE
];

echo Html::header('Tainix local PHP - ' . $code);
echo Html::challengeTitle($code);

if (! $keyIsConfigured) {
	echo Html::quote('Il faut configurer TAINIX_KEY dans le fichier .env à la racine');
} else {
	if (is_dir($challengeDirectory)) {
		echo Html::challengeSubTitle($code, $type);
		echo Html::quote($quotes[$type]);
		require $challengeDirectory . '/' . $challengeFile . $suffixes[$type];
	} else {
		echo Html::quote('Ce Challenge ne semble pas encore chargé. Retourne à l\'accueil et (re)charge les challenges.', 'danger');
	}
}

echo Html::link(['url' => './', 'name' => '&larr; Liste des challenges', 'class' => 'button-outline']);
echo Html::footer();