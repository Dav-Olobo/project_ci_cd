<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/Calculator.php';

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        $this->assertEquals(10, $calculator->add(4, 6));
    }

    public function testSubtract()
    {
        $calculator = new Calculator();

        $this->assertEquals(2, $calculator->subtract(80, 3));
    }
}