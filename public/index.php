<?php

require '../vendor/autoload.php';

use App\Calculadora;

$calc = new Calculadora(45, 34, 'soma');

echo $calc->getResultado();

echo '<br>';

echo "5 + 5 =" . Calculadora::calcular(5, 5, 'soma');
