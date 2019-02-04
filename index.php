<?php

require_once __DIR__ . '/vendor/autoload.php';

use Model\filter\Counter;
use Model\filter\FilterComposer;
use Model\filter\KeyWordsFilter;
use Model\filter\MoreThanTwoTextFilter;
use Model\filter\NoVocalTextFilter;
use Model\filter\TextFilter;
use Model\filter\VocalTextFilter;

$texto = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$textFiltered = new TextFilter($texto);
echo "El resultado de contar las palabras es: ";
$counter = new Counter($textFiltered);
echo $counter->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$vocal = new VocalTextFilter($textFiltered);

echo "El resultado de contar las palabras que empiezan por vocal es: ";
$counter2 = new Counter($vocal);
echo $counter2->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$moreThanTwo = new MoreThanTwoTextFilter($textFiltered);
echo "El resultado de contar las palabras que tienen mas de 2 caracteres es: ";
$counter3 = new Counter($moreThanTwo);
echo $counter3->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$keyWords = new KeyWordsFilter($textFiltered);
echo "El resultado de contar las palabras clave es : ";
$counter4 = new Counter($keyWords);
echo $counter4->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "---FILTROS COMPUESTOS--1--" . PHP_EOL;
echo "---" . PHP_EOL;
echo "El resultado de contar las palabras que tienen mas de 2 caracteres y empiezan por vocal es: ";
$vocalTwoCharacter = new MoreThanTwoTextFilter(new VocalTextFilter($textFiltered));
$counter5 = new Counter($vocalTwoCharacter);
echo $counter5->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar las palabras que clave que empiezan por vocal es: ";
$vocalKeywords = new KeyWordsFilter(new VocalTextFilter($textFiltered));
$counter6 = new Counter($vocalKeywords);
echo $counter6->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar las palabras que clave que empiezan por vocal y que tienen más de dos caracteres es: ";
$vocalKeywordsTwoCharacters = new MoreThanTwoTextFilter(new KeyWordsFilter(new VocalTextFilter($textFiltered)));
$counter7 = new Counter($vocalKeywordsTwoCharacters);
echo $counter7->countWords() . PHP_EOL;

echo "---FILTROS COMPUESTOS--2--" . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar solo palabras clave y que no empiecen por vocal  es: ";
$NoVocalKeyWords = new KeyWordsFilter(new NoVocalTextFilter($textFiltered));
$counter8 = new Counter($NoVocalKeyWords);
echo $counter8->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres: ";

$VocalOrMoreThanTwo = new FilterComposer($vocalTwoCharacter, new NoVocalTextFilter($textFiltered));

$counter9 = new Counter($VocalOrMoreThanTwo);
echo $counter9->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

?>