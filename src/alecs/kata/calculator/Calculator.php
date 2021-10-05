<?php

declare(strict_types=1);

namespace alecs\kata\calculator;

use InvalidArgumentException;
use ReflectionClass;

final class Calculator
{
    private int $result;

    public function __construct()
    {
        $this->result = 0;
    }

    public function getResult(): int
    {
        return $this->result;
    }

    public function add()
    {
        $this->calculateAll(func_get_args(), SumCommand::class);
    }

    public function substract()
    {
        $this->calculateAll(func_get_args(), SubstractCommand::class);
    }

    public function multiply(int $int)
    {
        $this->calculateAll(func_get_args(), MultiplyCommand::class);
    }

    public function divide(int $int)
    {
        $this->calculateAll(func_get_args(), DivideCommand::class);
    }

    private function calculateAll(array $numbers, $command)
    {
        foreach ($numbers as $num) {
            $this->calculate($num, $command);
        }
    }

    private function calculate($num, $commandClass)
    {
        if (!is_numeric($num)) {
            throw new InvalidArgumentException;
        }

        $commandArgs = array($num);
        $command = $this->createCommand($commandClass, $commandArgs);
        $this->result = $command->calculate($this->result);
    }

    private function createCommand($class, $constructorParams): CalculatorCommand
    {
        $reflectionClass = new ReflectionClass($class);
        $classInstance = $reflectionClass->newInstanceArgs($constructorParams);
        return $this->safeCast($classInstance);
    }

    private function safeCast($class): CalculatorCommand
    {
        return $class;
    }
}
