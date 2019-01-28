<?php

require_once __DIR__ . '/vendor/autoload.php';

use Model\KeyWordsCounter;
use Model\KeyWordsVocalCounter;
use Model\MoreThanTwoTextCounter;
use Model\textcounter;
use Model\TwoCharacterKeyWordsVocalCounter;
use Model\VocalTextCounter;
use Model\VocalTwoCharacterCounter;

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
echo "---" . PHP_EOL;
echo "---FILTROS COMPUESTOS---" . PHP_EOL;
echo "---" . PHP_EOL;
echo "El resultado de contar las palabras que tienen mas de 2 caracteres y empiezan por vocal es: ";
$vocalTwoCharacter = new VocalTwoCharacterCounter(new VocalTextCounter($wordCounter));
echo $vocalTwoCharacter->wordsNumber() . PHP_EOL;
echo "---" . PHP_EOL;
echo "El resultado de contar las palabras que clave que empiezan por vocal es: ";
$vocalKeywords = new KeyWordsVocalCounter(new VocalTextCounter($wordCounter));
echo $vocalKeywords->wordsNumber() . PHP_EOL;
echo "---" . PHP_EOL;
echo "El resultado de contar las palabras que clave que empiezan por vocal y que tienen más de dos caracteres es: ";
$vocalKeywordsTwoCharacters = new TwoCharacterKeyWordsVocalCounter(new KeyWordsVocalCounter(new VocalTextCounter($wordCounter)));
echo $vocalKeywordsTwoCharacters->wordsNumber() . PHP_EOL;

?>