<?php

namespace App;

class Calculadora
{
    private $valorA;
    private $valorB;
    private $operador;
    private $resultado;

    public function __construct($valorA, $valorB, $operador)
    {
        $this->valorA = $valorA;
        $this->valorB = $valorB;
        $this->operador = $operador;
    }

    public function getValorA()
    {
        return $this->valorA;
    }

    public function getValorB()
    {
        return $this->valorB;
    }

    public function getOperador()
    {
        return $this->operador;
    }

    public function getResultado()
    {
        switch ($this->getOperador()) {
            
            case 'soma':
                return $this->getValorA() + $this->getValorB();
            
            case 'subtrair':
                return $this->getValorA() - $this->getValorB();
            
            case 'dividir':
                if ($this->getValorB() == 0) {
                    return 'Não é um número!';
                }
                return $this->getValorA() / $this->getValorB();

            case 'multiplicar':
                return $this->getValorA() * $this->getValorB();

            default:
                return 'Operador inválido!';
        }
    }

    public static function calcular($valorA, $valorB, $operador)
    {
        $calc = new Calculadora($valorA, $valorB, $operador);
        return $calc->getResultado();
    }
}
