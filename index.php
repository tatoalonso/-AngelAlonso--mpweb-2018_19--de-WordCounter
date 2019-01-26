<?php

require_once __DIR__ . '/vendor/autoload.php';

use Model\textcounter;

$texto = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$wordCounter = new textcounter($texto);

echo "El resultado de contar las palabras es: ";
echo $wordCounter->wordsNumber() . PHP_EOL;

?>