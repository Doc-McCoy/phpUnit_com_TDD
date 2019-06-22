<?php

require '../vendor/autoload.php';

use App\Calculadora;

$calc = new Calculadora(45, 34, 'soma');

echo $calc->getResultado();