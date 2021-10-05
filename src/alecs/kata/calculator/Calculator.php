<?php

namespace alecs\kata\calculator;

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

    public function add(int $number)
    {
        $this->result = $this->result + $number;
    }
}
