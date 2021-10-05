<?php

declare(strict_types=1);

namespace alecs\kata\calculator\Tests;

use alecs\kata\calculator\Calculator;
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
}
