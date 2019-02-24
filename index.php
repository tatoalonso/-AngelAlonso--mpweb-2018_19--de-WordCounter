<?php

require_once __DIR__ . '/vendor/autoload.php';

use Model\Counter;
use Model\Filter\InclusiveFilter;
use Model\Filter\KeyWordsFilter;
use Model\Filter\MoreThanTwoTextFilter;
use Model\Filter\NoVocalTextFilter;
use Model\Filter\TextFilter;
use Model\Filter\VocalTextFilter;
use Model\Filter\ExcludingFilter;

$texto = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$text = new TextFilter($texto);
$textFiltered = $text->filter();

echo "El resultado de contar las palabras es: ";

$counter = new Counter($textFiltered);
echo $counter->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$vocal = new VocalTextFilter;

echo "El resultado de contar las palabras que empiezan por vocal es: ";
$counter2 = new Counter($vocal->filter($textFiltered));
echo $counter2->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$moreThanTwo = new MoreThanTwoTextFilter;
echo "El resultado de contar las palabras que tienen mas de 2 caracteres es: ";
$counter3 = new Counter($moreThanTwo->filter($textFiltered));
echo $counter3->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

$keyWords = new KeyWordsFilter;
echo "El resultado de contar las palabras clave es : ";
$counter4 = new Counter($keyWords->filter($textFiltered));
echo $counter4->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "---FILTROS COMPUESTOS--1--" . PHP_EOL;
echo "---" . PHP_EOL;
echo "El resultado de contar las palabras que tienen mas de 2 caracteres y empiezan por vocal es: ";
$vocalTwoCharacter = new ExcludingFilter (new MoreThanTwoTextFilter , new VocalTextFilter);
$counter5 = new Counter($vocalTwoCharacter->filter($textFiltered));
echo $counter5->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar las palabras que clave que empiezan por vocal es: ";
$vocalKeywords = new ExcludingFilter(new KeyWordsFilter,new VocalTextFilter);
$counter6 = new Counter($vocalKeywords->filter($textFiltered));
echo $counter6->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar las palabras que clave que empiezan por vocal y que tienen más de dos caracteres es: ";
$vocalKeywordsTwoCharacters = new ExcludingFilter (new MoreThanTwoTextFilter,new KeyWordsFilter,new VocalTextFilter);
$counter7 = new Counter($vocalKeywordsTwoCharacters->filter($textFiltered));
echo $counter7->countWords() . PHP_EOL;

echo "---FILTROS COMPUESTOS--2--" . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar solo palabras clave y que no empiecen por vocal  es: ";
$NoVocalKeyWords = new ExcludingFilter (new KeyWordsFilter, new NoVocalTextFilter);
$counter8 = new Counter($NoVocalKeyWords->filter($textFiltered));
echo $counter8->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

echo "El resultado de contar palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres: ";

$VocalOrMoreThanTwo = new InclusiveFilter($vocalTwoCharacter, new NoVocalTextFilter);

$counter9 = new Counter($VocalOrMoreThanTwo ->filter($textFiltered));
echo $counter9->countWords() . PHP_EOL;
echo "---" . PHP_EOL;

?>