<?php

declare(strict_types=1);

namespace alecs\kata\calculator\tests;

use alecs\kata\calculator\Calculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{

    private Calculator $calc;

    public function setUp(): void
    {
        $this->calc = new Calculator();
    }

    public function testResultDefaultsToZero()
    {
        $this->assertSame(0, $this->calc->getResult());
    }

    public function testAddNumber()
    {
        $this->calc->add(7);
        $this->assertSame(7, $this->calc->getResult());
    }

    public function testRequiresNumericValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->add('four');
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->add(2, 4, 3);

        $this->assertEquals(9, $this->calc->getResult());
        $this->assertNotEquals('Esto es una cadena', $this->getResult());
    }

    public function testSubstractNumber()
    {
        $this->calc->substract(4);

        $this->assertEquals(-4, $this->calc->getResult());
    }

    public function testMultiplyNumber()
    {
        $this->calc->add(2);
        $this->calc->multiply(4);

        $this->assertEquals(8, $this->calc->getResult());
    }

    public function testDivideNumber()
    {
        $this->calc->add(8);
        $this->calc->divide(2);

        $this->assertEquals(4, $this->calc->getResult());
    }
}
