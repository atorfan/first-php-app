<?php

declare(strict_types=1);

namespace alecs\kata\calculator;

interface CalculatorCommand
{
    public function calculate(int $base): int;
}
