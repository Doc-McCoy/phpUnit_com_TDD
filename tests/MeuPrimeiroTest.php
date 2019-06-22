<?php

use PHPUnit\Framework\TestCase;

class MeuPrimeiroTest extends TestCase
{
    public function testPrimeiroTeste()
    {
        $teste = 1 == 1;
        $this->assertTrue($teste);
    }
}
