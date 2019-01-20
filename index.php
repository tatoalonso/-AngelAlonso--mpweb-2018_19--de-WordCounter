<?php
//tiwg
require_once __DIR__ . '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, array('debug' => true));

use Model\nullcounter;
use Model\textcounter;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$wordCounter = new textcounter($_POST['content']);

} else {

	$wordCounter = new nullcounter();

}

$variables = [
	'wordNumber' => $wordCounter->wordsNumber(),
	'content' => $wordCounter->content(),
];
echo $twig->render('index.twig', $variables);

?>