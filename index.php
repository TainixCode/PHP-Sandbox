<?php
if (!file_exists('./vendor/autoload.php')) {
	die('Commence par lancer la commande "composer install"');
}

require './vendor/autoload.php';

use \Tainix\App;
use \Tainix\Html;
use \Tainix\Builder;

echo Html::header('TAINIX local PHP - Accueil');
echo Html::title('TAINIX \ Les Challenges disponibles');

$builder = new Builder;

if (isset($_POST[App::POST_KEY_BUILD])) {
	$nbNewEngines = $builder->build();

	if ($nbNewEngines == 0) {
		echo Html::quote('Aucun nouveau challenge ajouté.', 'danger');
	} else {
		echo Html::quote($nbNewEngines . ' nouveau(x) challenge(s) !', 'success');
	}
}

$links = $builder->linksOfEngines(App::TYPE_LOCAL);

if ($links === []) {
	echo Html::quote('Aucun challenge pour le moment, clique sur le bouton ci-dessous :', 'danger');
} else {
	echo Html::quote('Choisis un challenge ci-dessous, tu peux faire Ctrl+F pour en rechercher un rapidement. <br />Tu seras dirigé vers la page pour résoudre le challenge en <b>local</b>. Quand tu es prêt, passe à la version API pour suivre ta progression sur Tainix.fr.');

	echo '<p>';
	foreach ($links as $link) {
		echo Html::link($link) . ' &nbsp; ';
	}
	echo '</p>';

	echo '<br />';
}

// TODO : le faire en POST celui la ? Via une petite fonction postButton dans Html :)
echo Html::postButton(['url' => './', 'name' => App::POST_KEY_BUILD, 'value' => 'Charger les challenges']);
echo '<hr />';
echo Html::link(['url' => 'https://tainix.fr', 'name' => 'tainix.fr &rarr;', 'blank' => true, 'class' => 'button-outline']);

echo Html::footer();