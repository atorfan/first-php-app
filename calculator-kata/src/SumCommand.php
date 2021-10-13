<?php

declare(strict_types=1);

namespace alecs\kata\calculator;

final class SumCommand implements CalculatorCommand
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function calculate(int $base): int
    {
        return $base + $this->value;
    }
}
