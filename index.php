<?php

require_once __DIR__ . '/vendor/autoload.php';

use Model\KeyWordsCounter;
use Model\MoreThanTwoTextCounter;
use Model\textcounter;
use Model\VocalTextCounter;

$texto = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$wordCounter = new textcounter($texto);

echo "El resultado de contar las palabras es: ";
echo $wordCounter->wordsNumber() . PHP_EOL;
echo "---" . PHP_EOL;
$vocal = new VocalTextCounter($wordCounter);
echo "El resultado de contar las palabras que empiezan por vocal es: ";
echo $vocal->wordsNumber() . PHP_EOL;
echo "---" . PHP_EOL;
$MoreThanTwo = new MoreThanTwoTextCounter($wordCounter);
echo "El resultado de contar las palabras que tienen mas de 2 caracteres es: ";
echo $MoreThanTwo->wordsNumber() . PHP_EOL;
echo "---" . PHP_EOL;
$KeyWordsCounter = new KeyWordsCounter($wordCounter);
echo "El resultado de contar las palabras clave es : ";
echo $KeyWordsCounter->wordsNumber() . PHP_EOL;

?>