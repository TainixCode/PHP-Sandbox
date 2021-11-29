<?php
if (!file_exists('./vendor/autoload.php')) {
	die('Commence par lancer la commande "composer install"');
}

if (!file_exists('./key.php')) {
	die('Colle ta key dans le fichier key.php');
}

require './vendor/autoload.php';
require './key.php';
require './constants.php';

use \Tainix\Html;
use \Tainix\Builder;

// Sécurité
if (!isset($_GET[GET_KEY_TYPE]) || !isset($_GET[GET_KEY_CHALLENGE])) {
	header('Location: ./');
}

$code = $_GET[GET_KEY_CHALLENGE];
$type = $_GET[GET_KEY_TYPE];
$challengeFile = strtolower($code);
$challengeDirectory = './challenges/' . strtoupper($code);

$quotes = [
	TYPE_API => 'Ces données changent à chaque affichage de cette page.',
	TYPE_LOCAL => 'Ces données sont figées, accéde à l\'énoncé si tu en veux d\'autres.'
];

$suffixes = [
	TYPE_API => SUFFIX_API_FILE,
	TYPE_LOCAL => SUFFIX_LOCAL_FILE
];

echo Html::header('Tainix local PHP - ' . $code);
echo Html::challengeTitle($code);

if (is_dir($challengeDirectory)) {
	echo Html::challengeSubTitle($code, $type);
	echo Html::quote($quotes[$type]);
	require $challengeDirectory . '/' . $challengeFile . $suffixes[$type];
} else {
	echo Html::quote('Ce Challenge ne semble pas encore chargé. Retourne à l\'accueil et (re)charge les challenges.', 'danger');
}

echo Html::link(['url' => './', 'name' => '&larr; Liste des challenges', 'class' => 'button-outline']);
echo Html::footer();