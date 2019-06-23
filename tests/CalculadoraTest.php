<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testAtributosCalculadora()
    {
        $this->assertClassHasAttribute('valorA', Calculadora::class, 'Falta o atributo valorA');
        $this->assertClassHasAttribute('valorB', Calculadora::class, 'Falta o atributo valorB');
        $this->assertClassHasAttribute('operador', Calculadora::class, 'Falta o atributo operador');
        $this->assertClassHasAttribute('resultado', Calculadora::class, 'Falta o atributo resultado');
    }

    /**
     * @depends testAtributosCalculadora
     */
    public function testMetodosCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, 'getValorA'), 'Falta o método getValorA.');
        $this->assertTrue(method_exists(Calculadora::class, 'getValorB'), 'Falta o método getValorB.');
        $this->assertTrue(method_exists(Calculadora::class, 'getOperador'), 'Falta o método getOperador.');
        $this->assertTrue(method_exists(Calculadora::class, 'getResultado'), 'Falta o método getResultado.');
    }

    /**
     * @depends testAtributosCalculadora
     */
    public function testConstrutorCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, '__construct'), 'Falta o método construtor.');
        
        // Verifica se construtor está atribuindo valores aos atributos.
        $calc = new Calculadora(2, 3, 'soma');
        $this->assertEquals(2, $calc->getValorA(), 'Falha na atribuição do valorA.');
        $this->assertEquals(3, $calc->getValorB(), 'Falha na atribuição do valorB.');
        $this->assertEquals('soma', $calc->getOperador(), 'Falha na atribuição do operador.');

        // Acesso aos atributos privados
        $this->assertFalse(isset($calc->valorA), 'Atributo valorA deve ser privado.');
        $this->assertFalse(isset($calc->valorB), 'Atributo valorB deve ser privado.');
        $this->assertFalse(isset($calc->operador), 'Atributo operador deve ser privado.');
        $this->assertFalse(isset($calc->resultado), 'Atributo resultado deve ser privado.');
    }

    /**
     * @depends testConstrutorCalculadora
     */
    public function testGetResultadoCalculadora()
    {
        $calc = new Calculadora(4, 2, 'soma');
        $this->assertEquals(6, $calc->getResultado(), 'Erro no método getResultado com soma.');
        $calc = new Calculadora(3, 2, 'soma');
        $this->assertEquals(5, $calc->getResultado(), 'Erro no método getResultado com soma.');

        $calc = new Calculadora(6, 3, 'subtrair');
        $this->assertEquals(3, $calc->getResultado(), 'Erro no método getResultado com subtração.');

        $calc = new Calculadora(6, 3, 'dividir');
        $this->assertEquals(2, $calc->getResultado(), 'Erro no método getResultado com divisão.');
        $calc = new Calculadora(2, 3, 'dividir');
        $this->assertEquals(2/3, $calc->getResultado(), 'Erro no método getResultado com divisão.');
        $calc = new Calculadora(4, 0, 'dividir');
        $this->assertEquals('Não é um número!', $calc->getResultado(), 'Erro no método getResultado com divisão por zero.');

        $calc = new Calculadora(6, 6, 'multiplicar');
        $this->assertEquals(6*6, $calc->getResultado(), 'Erro no método getResultado com multiplicação.');

        $calc = new Calculadora(2, 2, 'batata');
        $this->assertEquals('Operador inválido!', $calc->getResultado(), 'Erro no método getResultado quando é passado operador inválido.');
    }

    /**
     * @depends testGetResultadoCalculadora
     */
    public function testStaticCalculadora()
    {
        $resultado = Calculadora::calcular(2, 4, 'soma');
        $this->assertEquals(6, $resultado, 'Erro no método estático calcular.');
    }
}
